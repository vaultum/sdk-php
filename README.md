# Vaultum PHP SDK

![Tests](https://github.com/vaultum/sdk-php/workflows/PHP%20SDK%20Tests/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/vaultum/sdk/v)](https://packagist.org/packages/vaultum/sdk)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)

## 📦 Installation

Install via Composer:

```bash
composer require vaultum/sdk
```

## 🚀 Quick Start

```php
<?php
require 'vendor/autoload.php';

use Vaultum\SDK\Client;
use Vaultum\SDK\Enums\Chain;

// Initialize client
$client = new Client(
    'https://api.vaultum.app',
    Chain::ETHEREUM
);

// Create a smart account
$account = $client->createAccount(
    owner: '0xYourAddress',
    modules: ['sessionKeys', 'spendingLimits']
);

// Build a user operation
$userOp = $client->buildUserOperation([
    'account' => $account->address,
    'to' => '0xRecipient',
    'value' => '1000000000000000000', // 1 ETH
    'data' => '0x',
]);

// Submit the operation
$result = $client->submitUserOperation($userOp);

// Wait for confirmation
$receipt = $client->waitForOperation($result->id);
```

## ✨ Features

- **Type Safety** - Full PHP 8.2+ type hints and enums
- **PSR Compliance** - PSR-4 autoloading, PSR-7 HTTP
- **Account Abstraction** - ERC-4337 UserOperation support
- **Session Keys** - Temporary key management
- **Gas Abstraction** - Paymaster integration
- **Multi-chain** - Support for multiple EVM chains
- **Async Support** - Compatible with ReactPHP/Amp

## 📚 API Reference

### Client

The main client for interacting with Vaultum.

```php
use Vaultum\SDK\Client;
use Vaultum\SDK\Enums\Chain;

$client = new Client(
    string $apiUrl,
    Chain $chain,
    ?string $apiKey = null
);
```

### Account Management

#### Create Account

```php
$account = $client->createAccount(
    string $owner,
    array $modules = [],
    ?string $salt = null
);
```

#### Get Account

```php
$account = $client->getAccount(string $address);
```

### User Operations

#### Build UserOperation

```php
use Vaultum\SDK\DTO\UserOperation;

$userOp = $client->buildUserOperation([
    'account' => '0x...',
    'to' => '0x...',
    'value' => '1000000000000000000',
    'data' => '0x',
]);
```

#### Submit UserOperation

```php
use Vaultum\SDK\DTO\SubmitRequest;

$request = new SubmitRequest(
    chain: Chain::ETHEREUM,
    userOp: $userOp,
    signature: $signature
);

$response = $client->submitOperation($request);
echo "Operation ID: " . $response->id;
```

#### Wait for Operation

```php
use Vaultum\SDK\WaitForOp;

$result = WaitForOp::run(
    $client,
    $operationId,
    intervalMs: 1500,
    timeoutMs: 120000
);
```

### Session Keys

```php
// Create session key
$sessionKey = $client->createSessionKey(
    account: $accountAddress,
    permissions: ['transfer', 'approve'],
    expiry: time() + 86400 // 24 hours
);

// Use session key
$client->setSessionKey($sessionKey->privateKey);
```

### Gas Estimation

```php
$quote = $client->getQuote(
    new QuoteRequest(
        chain: Chain::ETHEREUM,
        userOp: $userOp
    )
);

echo "Estimated gas: " . $quote->estimatedGas;
echo "Max fee: " . $quote->maxFee;
```

## 🧪 Testing

```bash
# Run tests
composer test

# Run with coverage
composer test:coverage

# Run specific test
composer test -- --filter=testCreateAccount
```

## 🔧 Advanced Usage

### Custom HTTP Client

```php
use GuzzleHttp\Client as HttpClient;

$httpClient = new HttpClient([
    'timeout' => 30,
    'verify' => true,
]);

$client = new Client(
    'https://api.vaultum.app',
    Chain::ETHEREUM,
    httpClient: $httpClient
);
```

### Batch Operations

```php
$batch = $client->batchOperations([
    ['to' => $addr1, 'value' => $amount1],
    ['to' => $addr2, 'value' => $amount2],
]);
```

### Error Handling

```php
use Vaultum\SDK\Exceptions\VaultumException;
use Vaultum\SDK\Exceptions\ValidationException;

try {
    $result = $client->submitOperation($request);
} catch (ValidationException $e) {
    echo "Validation error: " . $e->getMessage();
} catch (VaultumException $e) {
    echo "API error: " . $e->getMessage();
}
```

## 🌐 Supported Chains

```php
use Vaultum\SDK\Enums\Chain;

Chain::ETHEREUM    // Ethereum Mainnet
Chain::POLYGON     // Polygon
Chain::ARBITRUM    // Arbitrum One
Chain::OPTIMISM    // Optimism
Chain::BASE        // Base
Chain::AVALANCHE   // Avalanche C-Chain
Chain::BSC         // BNB Smart Chain
```

## 📊 Requirements

- PHP 8.2 or higher
- Composer
- ext-json
- ext-openssl (for signature verification)

## 🛡️ Security

- All requests use HTTPS
- API key authentication
- Request signing for sensitive operations
- Input validation and sanitization

## 🤝 Contributing

We welcome contributions! Please see our [Contributing Guide](CONTRIBUTING.md) for details.

### Development Setup

```bash
# Clone repository
git clone https://github.com/vaultum/sdk-php
cd sdk-php

# Install dependencies
composer install

# Run tests
composer test

# Check code style
composer cs-fix
```

## 📄 License

MIT License - see [LICENSE](LICENSE) for details.

## 🔗 Links

- [Documentation](https://docs.vaultum.app/sdk-php)
- [API Reference](https://api.vaultum.app/docs)
- [Examples](https://github.com/vaultum/sdk-php/tree/main/examples)
- [Packagist](https://packagist.org/packages/vaultum/sdk)
- [Discord](https://discord.gg/vaultum)

---

Built with ❤️ by the Vaultum team