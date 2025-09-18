# Vaultum SDK for PHP

PHP SDK for Vaultum Smart Account - ERC-4337 Account Abstraction Wallet

## Installation

Install via Composer:

```bash
composer require vaultum/sdk
```

## Quick Start

```php
<?php
require_once 'vendor/autoload.php';

use VaultumSDK\Configuration;
use VaultumSDK\ApiException;
use VaultumSDK\Api\AccountApi;
use VaultumSDK\Api\UserOpApi;

// Configure API client
$config = Configuration::getDefaultConfiguration()
    ->setApiKey('Authorization', 'your-api-key')
    ->setApiKeyPrefix('Authorization', 'Bearer');

// Initialize APIs
$accountApi = new AccountApi(null, $config);
$userOpApi = new UserOpApi(null, $config);

// Deploy a smart account
try {
    $deployRequest = [
        'owner' => '0x...',
        'modules' => ['social-recovery', 'session-keys', 'spending-limits']
    ];
    $account = $accountApi->deployAccount($deployRequest);
    echo "Account deployed at: " . $account->getAddress() . "\n";
} catch (ApiException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Submit a UserOperation
try {
    $userOp = [
        'account' => $account->getAddress(),
        'calls' => [
            [
                'to' => '0x...',
                'value' => '0',
                'data' => '0x...'
            ]
        ]
    ];
    $opId = $userOpApi->submitUserOp($userOp);
    echo "Operation ID: " . $opId->getId() . "\n";
} catch (ApiException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
```

## Features

- 🔐 **Smart Account Management**: Deploy and manage ERC-4337 smart accounts
- 🔑 **Session Keys**: Grant time-bound, limited permissions
- 👥 **Social Recovery**: Recover accounts with guardian approvals
- 💰 **Spending Limits**: Set daily spending caps per token
- ⛽ **Gasless Transactions**: Submit UserOps with paymaster support
- 🔗 **Cross-chain Support**: Works on Ethereum, Polygon, Arbitrum, Optimism, Base

## API Reference

### Account Management

```php
// Deploy new account
$account = $accountApi->deployAccount($params);

// Get account info
$info = $accountApi->getAccount($address);
```

### UserOperations

```php
// Submit UserOp
$opId = $userOpApi->submitUserOp($userOp);

// Get status
$status = $userOpApi->getOpStatus($opId);

// Wait for completion
$receipt = $userOpApi->waitForOp($opId);
```

### Recovery Module

```php
// Initiate recovery
$recoveryApi->initiateRecovery($account, $newOwner);

// Support recovery
$recoveryApi->supportRecovery($account, $nonce);

// Execute recovery
$recoveryApi->executeRecovery($account, $nonce);

// Get recovery status
$status = $recoveryApi->getRecoveryStatus($account);
```

### Session Keys

```php
// Grant session key
$sessionApi->grantSessionKey($account, $key, $expiry, $selectors);

// Revoke session key
$sessionApi->revokeSessionKey($account, $key);

// Update selectors
$sessionApi->updateSelectors($account, $key, $selectors);
```

### Spending Limits

```php
// Set limit
$limitsApi->setSpendingLimit($account, $token, $cap);

// Get limits status
$status = $limitsApi->getLimitsStatus($account);

// Enable owner bypass
$limitsApi->enableOwnerBypass($account, $duration);
```

## Configuration

### Authentication

The SDK uses Bearer token authentication:

```php
$config = Configuration::getDefaultConfiguration()
    ->setApiKey('Authorization', 'your-api-key')
    ->setApiKeyPrefix('Authorization', 'Bearer');
```

### Custom API Endpoint

```php
$config = Configuration::getDefaultConfiguration()
    ->setHost('https://api.vaultum.io');
```

### Request Timeout

```php
$config = Configuration::getDefaultConfiguration()
    ->setApiKey('Authorization', 'your-api-key')
    ->setApiKeyPrefix('Authorization', 'Bearer')
    ->setTempFolderPath(sys_get_temp_dir())
    ->setDebug(true);
```

## Networks Supported

- Ethereum Mainnet
- Ethereum Sepolia (testnet)
- Polygon
- Arbitrum
- Optimism
- Base

## Requirements

- PHP 8.1 or higher
- ext-curl
- ext-json
- ext-mbstring

## Testing

Run the test suite:

```bash
composer test
```

## License

MIT

## Links

- [GitHub Repository](https://github.com/vaultum/vaultum)
- [Documentation](https://docs.vaultum.io)
- [Packagist Package](https://packagist.org/packages/vaultum/sdk)

## Support

For issues and feature requests, please visit our [GitHub Issues](https://github.com/vaultum/vaultum/issues).