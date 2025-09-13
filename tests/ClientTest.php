<?php

declare(strict_types=1);

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Vaultum\SDK\Client;
use Vaultum\SDK\DTO\QuoteRequest;
use Vaultum\SDK\DTO\SubmitRequest;
use Vaultum\SDK\DTO\UserOperation;
use Vaultum\SDK\Enums\Chain;
use Vaultum\SDK\Enums\OperationState;
use Vaultum\SDK\Exceptions\VaultumException;
use Vaultum\SDK\Exceptions\ValidationException;

test('can get a quote successfully', function () {
    $mockResponse = [
        'estimatedFee' => '50000000000000000',
        'route' => [
            'path' => ['ethereum', 'polygon'],
            'bridges' => ['connext'],
            'estimatedTime' => 300
        ]
    ];
    
    $mock = new MockHandler([
        new Response(200, [], json_encode($mockResponse))
    ]);
    
    $handlerStack = HandlerStack::create($mock);
    $client = new Client('http://localhost:8000', [
        'httpClient' => new HttpClient(['handler' => $handlerStack])
    ]);
    
    $request = new QuoteRequest(
        Chain::ETHEREUM,
        Chain::POLYGON,
        '0x0000000000000000000000000000000000000000',
        '1000000000000000000'
    );
    
    $response = $client->quoteOp($request);
    
    expect($response->estimatedFee)->toBe('50000000000000000');
    expect($response->route->path)->toBe(['ethereum', 'polygon']);
    expect($response->route->bridges)->toBe(['connext']);
    expect($response->route->estimatedTime)->toBe(300);
});

test('can submit an operation successfully', function () {
    $mockResponse = [
        'id' => '550e8400-e29b-41d4-a716-446655440000'
    ];
    
    $mock = new MockHandler([
        new Response(201, [], json_encode($mockResponse))
    ]);
    
    $handlerStack = HandlerStack::create($mock);
    $client = new Client('http://localhost:8000', [
        'httpClient' => new HttpClient(['handler' => $handlerStack])
    ]);
    
    $userOp = new UserOperation(
        '0x742d35Cc6634C0532925a3b844Bc9e7595f0bEb0',
        '0',
        '0x',
        '0xb61d27f6',
        '100000',
        '100000',
        '21000',
        '1000000000',
        '1000000000',
        '0x'
    );
    
    $request = new SubmitRequest(
        Chain::ETHEREUM,
        $userOp,
        '0x' . str_repeat('a', 130)
    );
    
    $response = $client->submitOp($request);
    
    expect($response->id)->toBe('550e8400-e29b-41d4-a716-446655440000');
});

test('can get operation status successfully', function () {
    $mockResponse = [
        'id' => '550e8400-e29b-41d4-a716-446655440000',
        'state' => 'sent',
        'txHash' => '0x' . str_repeat('a', 64)
    ];
    
    $mock = new MockHandler([
        new Response(200, [], json_encode($mockResponse))
    ]);
    
    $handlerStack = HandlerStack::create($mock);
    $client = new Client('http://localhost:8000', [
        'httpClient' => new HttpClient(['handler' => $handlerStack])
    ]);
    
    $response = $client->getOpStatus('550e8400-e29b-41d4-a716-446655440000');
    
    expect($response->id)->toBe('550e8400-e29b-41d4-a716-446655440000');
    expect($response->state)->toBe(OperationState::SENT);
    expect($response->txHash)->toStartWith('0x');
});

test('handles validation errors properly', function () {
    $mockResponse = [
        'message' => 'The given data was invalid.',
        'errors' => [
            'fromChain' => ['The fromChain must be one of: ethereum, polygon, arbitrum, optimism, base'],
            'token' => ['The token must be a valid Ethereum address']
        ]
    ];
    
    $mock = new MockHandler([
        new Response(422, [], json_encode($mockResponse))
    ]);
    
    $handlerStack = HandlerStack::create($mock);
    $client = new Client('http://localhost:8000', [
        'httpClient' => new HttpClient(['handler' => $handlerStack])
    ]);
    
    $request = new QuoteRequest(
        Chain::ETHEREUM,
        Chain::POLYGON,
        'invalid',
        '1000000000000000000'
    );
    
    expect(fn() => $client->quoteOp($request))
        ->toThrow(ValidationException::class);
});

test('validates UUID format for operation ID', function () {
    $client = new Client('http://localhost:8000');
    
    expect(fn() => $client->getOpStatus('invalid-id'))
        ->toThrow(VaultumException::class, 'Invalid operation ID format');
});

test('can wait for operation completion', function () {
    $mockResponses = [
        ['id' => '550e8400-e29b-41d4-a716-446655440000', 'state' => 'queued', 'txHash' => null],
        ['id' => '550e8400-e29b-41d4-a716-446655440000', 'state' => 'sent', 'txHash' => '0x123'],
        ['id' => '550e8400-e29b-41d4-a716-446655440000', 'state' => 'success', 'txHash' => '0x123'],
    ];
    
    $mock = new MockHandler([
        new Response(200, [], json_encode($mockResponses[0])),
        new Response(200, [], json_encode($mockResponses[1])),
        new Response(200, [], json_encode($mockResponses[2])),
    ]);
    
    $handlerStack = HandlerStack::create($mock);
    // Create HttpClient with base_uri so relative paths work
    $client = new Client('http://localhost:8000', [
        'httpClient' => new HttpClient([
            'handler' => $handlerStack,
            'base_uri' => 'http://localhost:8000'
        ])
    ]);
    
    $statusChanges = [];
    $response = $client->waitForOperation('550e8400-e29b-41d4-a716-446655440000', [
        'pollingInterval' => 0,
        'onStatusChange' => function ($status) use (&$statusChanges) {
            $statusChanges[] = $status->state->value;
        }
    ]);
    
    expect($response->state)->toBe(OperationState::SUCCESS);
    expect($statusChanges)->toBe(['queued', 'sent', 'success']);
});

test('handles network errors gracefully', function () {
    $mock = new MockHandler([
        new RequestException('Network error', new Request('GET', 'test'))
    ]);
    
    $handlerStack = HandlerStack::create($mock);
    $client = new Client('http://localhost:8000', [
        'httpClient' => new HttpClient(['handler' => $handlerStack])
    ]);
    
    expect(fn() => $client->getOpStatus('550e8400-e29b-41d4-a716-446655440000'))
        ->toThrow(VaultumException::class);
});
