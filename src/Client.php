<?php

declare(strict_types=1);

namespace Vaultum\SDK;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Ramsey\Uuid\Uuid;
use Vaultum\SDK\DTO\QuoteRequest;
use Vaultum\SDK\DTO\QuoteResponse;
use Vaultum\SDK\DTO\SubmitRequest;
use Vaultum\SDK\DTO\SubmitResponse;
use Vaultum\SDK\DTO\StatusResponse;
use Vaultum\SDK\Exceptions\VaultumException;
use Vaultum\SDK\Exceptions\ValidationException;

class Client
{
    private HttpClient $httpClient;
    private string $baseUrl;
    
    public function __construct(string $baseUrl, array $options = [])
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        
        // Allow injecting a custom HTTP client for testing
        if (isset($options['httpClient'])) {
            $this->httpClient = $options['httpClient'];
        } else {
            $config = [
                'base_uri' => $this->baseUrl,
                'timeout' => $options['timeout'] ?? 30,
                'headers' => array_merge([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ], $options['headers'] ?? [])
            ];
            
            $this->httpClient = new HttpClient($config);
        }
    }
    
    /**
     * Get a quote for a cross-chain operation
     * 
     * @param QuoteRequest $request
     * @return QuoteResponse
     * @throws VaultumException
     */
    public function quoteOp(QuoteRequest $request): QuoteResponse
    {
        $response = $this->request('POST', '/api/op/quote', $request->toArray());
        return QuoteResponse::fromArray($response);
    }
    
    /**
     * Submit a UserOperation for execution
     * 
     * @param SubmitRequest $request
     * @return SubmitResponse
     * @throws VaultumException
     */
    public function submitOp(SubmitRequest $request): SubmitResponse
    {
        $response = $this->request('POST', '/api/op/submit', $request->toArray());
        return SubmitResponse::fromArray($response);
    }
    
    /**
     * Get the status of a submitted operation
     * 
     * @param string $id Operation ID (UUID)
     * @return StatusResponse
     * @throws VaultumException
     */
    public function getOpStatus(string $id): StatusResponse
    {
        if (!Uuid::isValid($id)) {
            throw new VaultumException('Invalid operation ID format');
        }
        
        $response = $this->request('GET', "/api/op/{$id}");
        return StatusResponse::fromArray($response);
    }
    
    /**
     * Wait for an operation to complete
     * 
     * @param string $id Operation ID
     * @param array $options Polling options
     * @return StatusResponse
     * @throws VaultumException
     */
    public function waitForOperation(string $id, array $options = []): StatusResponse
    {
        $pollingInterval = $options['pollingInterval'] ?? 2;
        $maxAttempts = $options['maxAttempts'] ?? 60;
        $onStatusChange = $options['onStatusChange'] ?? null;
        
        for ($i = 0; $i < $maxAttempts; $i++) {
            $status = $this->getOpStatus($id);
            
            if ($onStatusChange && is_callable($onStatusChange)) {
                $onStatusChange($status);
            }
            
            if (in_array($status->state->value, ['success', 'failed'])) {
                return $status;
            }
            
            sleep($pollingInterval);
        }
        
        throw new VaultumException('Operation timeout: max attempts reached');
    }
    
    /**
     * Make an HTTP request
     * 
     * @param string $method
     * @param string $path
     * @param array|null $body
     * @return array
     * @throws VaultumException
     */
    private function request(string $method, string $path, ?array $body = null): array
    {
        try {
            $options = [];
            if ($body !== null) {
                $options['json'] = $body;
            }
            
            $response = $this->httpClient->request($method, $path, $options);
            
            $content = $response->getBody()->getContents();
            return json_decode($content, true, 512, JSON_THROW_ON_ERROR);
            
        } catch (RequestException $e) {
            $response = $e->getResponse();
            
            if ($response) {
                $content = $response->getBody()->getContents();
                $data = json_decode($content, true);
                
                if ($response->getStatusCode() === 422 && isset($data['errors'])) {
                    throw new ValidationException(
                        $data['message'] ?? 'Validation failed',
                        $data['errors']
                    );
                }
                
                throw new VaultumException(
                    $data['error'] ?? "Request failed with status {$response->getStatusCode()}",
                    $response->getStatusCode()
                );
            }
            
            throw new VaultumException($e->getMessage());
            
        } catch (GuzzleException $e) {
            throw new VaultumException($e->getMessage());
        } catch (\JsonException $e) {
            throw new VaultumException('Invalid JSON response: ' . $e->getMessage());
        }
    }
}
