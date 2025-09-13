# Vaultum SDK for PHP

PHP SDK for the Vaultum cross-chain account abstraction wallet.

## Requirements

- PHP 8.3+
- Composer

## Installation

```bash
composer require vaultum/sdk-php
```

## Usage

### Basic Setup

```php
<?php

use Vaultum\SDK\Client;

$client = new Client('https://api.vaultum.io', [
    'headers' => [
        'X-API-Key' => 'your-api-key' // Optional
    ],
    'timeout' => 30 // Optional, defaults to 30 seconds
]);
```

### Get a Quote

```php
use Vaultum\SDK\DTO\QuoteRequest;
use Vaultum\SDK\Enums\Chain;

$request = new QuoteRequest(
    Chain::ETHEREUM,
    Chain::POLYGON,
    '0x0000000000000000000000000000000000000000', // Native token
    '1000000000000000000' // 1 ETH in wei
);

$quote = $client->quoteOp($request);

echo "Estimated fee: {$quote->estimatedFee}\n";
echo "Route: " . implode(' -> ', $quote->route->path) . "\n";
echo "Estimated time: {$quote->route->estimatedTime}s\n";
```

### Submit a UserOperation

```php
use Vaultum\SDK\DTO\SubmitRequest;
use Vaultum\SDK\DTO\UserOperation;
use Vaultum\SDK\Enums\Chain;

$userOp = new UserOperation(
    sender: '0x742d35Cc6634C0532925a3b844Bc9e7595f0bEb0',
    nonce: '0',
    initCode: '0x',
    callData: '0xb61d27f6...',
    callGasLimit: '100000',
    verificationGasLimit: '100000',
    preVerificationGas: '21000',
    maxFeePerGas: '1000000000',
    maxPriorityFeePerGas: '1000000000',
    paymasterAndData: '0x'
);

$request = new SubmitRequest(
    Chain::ETHEREUM,
    $userOp,
    '0x...' // 65 bytes signature
);

$submission = $client->submitOp($request);

echo "Operation ID: {$submission->id}\n";
```

### Check Operation Status

```php
$status = $client->getOpStatus('550e8400-e29b-41d4-a716-446655440000');

echo "State: {$status->state->value}\n";
if ($status->txHash) {
    echo "Transaction hash: {$status->txHash}\n";
}
```

### Wait for Operation Completion

```php
$finalStatus = $client->waitForOperation($operationId, [
    'pollingInterval' => 2, // Check every 2 seconds
    'maxAttempts' => 60, // Maximum 60 attempts (2 minutes)
    'onStatusChange' => function ($status) {
        echo "Operation state: {$status->state->value}\n";
    }
]);

if ($finalStatus->state === OperationState::SUCCESS) {
    echo "Transaction successful: {$finalStatus->txHash}\n";
} else {
    echo "Transaction failed\n";
}
```

## Error Handling

```php
use Vaultum\SDK\Exceptions\VaultumException;
use Vaultum\SDK\Exceptions\ValidationException;

try {
    $quote = $client->quoteOp($request);
} catch (ValidationException $e) {
    echo "Validation error: {$e->getMessage()}\n";
    
    foreach ($e->getErrors() as $field => $messages) {
        echo "$field: " . implode(', ', $messages) . "\n";
    }
} catch (VaultumException $e) {
    echo "Error: {$e->getMessage()}\n";
    echo "Status code: {$e->statusCode}\n";
}
```

## Available Chains

```php
use Vaultum\SDK\Enums\Chain;

Chain::ETHEREUM
Chain::POLYGON
Chain::ARBITRUM
Chain::OPTIMISM
Chain::BASE
```

## Operation States

```php
use Vaultum\SDK\Enums\OperationState;

OperationState::QUEUED  // Operation is in the queue
OperationState::SENT    // Operation has been sent to the blockchain
OperationState::SUCCESS // Operation completed successfully
OperationState::FAILED  // Operation failed
```

## DTOs (Data Transfer Objects)

All request and response data is handled through strongly-typed DTOs:

- `QuoteRequest` - Request for getting a quote
- `QuoteResponse` - Response containing quote details
- `SubmitRequest` - Request for submitting a UserOperation
- `SubmitResponse` - Response containing operation ID
- `StatusResponse` - Response containing operation status
- `UserOperation` - ERC-4337 UserOperation structure
- `Route` - Route information for cross-chain operations

## Testing

```bash
# Install dependencies
composer install

# Run tests
composer test
```

## Development

### Running Tests

```bash
./vendor/bin/pest
```

### Code Standards

This SDK follows PSR-12 coding standards and uses strict typing throughout.

## License

MIT
