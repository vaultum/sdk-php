# VaultumSDK\RecoveryApi

All URIs are relative to https://api.vaultum.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**apiRecoveryAccountStatusGet()**](RecoveryApi.md#apiRecoveryAccountStatusGet) | **GET** /api/recovery/{account}/status | Get recovery status |
| [**apiRecoveryCancelPost()**](RecoveryApi.md#apiRecoveryCancelPost) | **POST** /api/recovery/cancel | Cancel recovery |
| [**apiRecoveryExecutePost()**](RecoveryApi.md#apiRecoveryExecutePost) | **POST** /api/recovery/execute | Execute recovery |
| [**apiRecoveryInitiatePost()**](RecoveryApi.md#apiRecoveryInitiatePost) | **POST** /api/recovery/initiate | Initiate social recovery |
| [**apiRecoverySupportPost()**](RecoveryApi.md#apiRecoverySupportPost) | **POST** /api/recovery/support | Support active recovery |


## `apiRecoveryAccountStatusGet()`

```php
apiRecoveryAccountStatusGet($account): \VaultumSDK\Model\RecoveryStatus
```

Get recovery status

Check if account has pending recovery

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\RecoveryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account = 'account_example'; // string

try {
    $result = $apiInstance->apiRecoveryAccountStatusGet($account);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecoveryApi->apiRecoveryAccountStatusGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account** | **string**|  | |

### Return type

[**\VaultumSDK\Model\RecoveryStatus**](../Model/RecoveryStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiRecoveryCancelPost()`

```php
apiRecoveryCancelPost($recovery_cancel_request): \VaultumSDK\Model\RecoveryResponse
```

Cancel recovery

Account owner cancels active recovery

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\RecoveryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$recovery_cancel_request = new \VaultumSDK\Model\RecoveryCancelRequest(); // \VaultumSDK\Model\RecoveryCancelRequest

try {
    $result = $apiInstance->apiRecoveryCancelPost($recovery_cancel_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecoveryApi->apiRecoveryCancelPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **recovery_cancel_request** | [**\VaultumSDK\Model\RecoveryCancelRequest**](../Model/RecoveryCancelRequest.md)|  | |

### Return type

[**\VaultumSDK\Model\RecoveryResponse**](../Model/RecoveryResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiRecoveryExecutePost()`

```php
apiRecoveryExecutePost($recovery_execute_request): \VaultumSDK\Model\RecoveryResponse
```

Execute recovery

Execute recovery after timelock and threshold

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\RecoveryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$recovery_execute_request = new \VaultumSDK\Model\RecoveryExecuteRequest(); // \VaultumSDK\Model\RecoveryExecuteRequest

try {
    $result = $apiInstance->apiRecoveryExecutePost($recovery_execute_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecoveryApi->apiRecoveryExecutePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **recovery_execute_request** | [**\VaultumSDK\Model\RecoveryExecuteRequest**](../Model/RecoveryExecuteRequest.md)|  | |

### Return type

[**\VaultumSDK\Model\RecoveryResponse**](../Model/RecoveryResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiRecoveryInitiatePost()`

```php
apiRecoveryInitiatePost($recovery_request): \VaultumSDK\Model\RecoveryResponse
```

Initiate social recovery

Guardian initiates recovery process

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\RecoveryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$recovery_request = new \VaultumSDK\Model\RecoveryRequest(); // \VaultumSDK\Model\RecoveryRequest

try {
    $result = $apiInstance->apiRecoveryInitiatePost($recovery_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecoveryApi->apiRecoveryInitiatePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **recovery_request** | [**\VaultumSDK\Model\RecoveryRequest**](../Model/RecoveryRequest.md)|  | |

### Return type

[**\VaultumSDK\Model\RecoveryResponse**](../Model/RecoveryResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiRecoverySupportPost()`

```php
apiRecoverySupportPost($recovery_support_request): \VaultumSDK\Model\RecoveryResponse
```

Support active recovery

Guardian approves an active recovery request

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\RecoveryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$recovery_support_request = new \VaultumSDK\Model\RecoverySupportRequest(); // \VaultumSDK\Model\RecoverySupportRequest

try {
    $result = $apiInstance->apiRecoverySupportPost($recovery_support_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecoveryApi->apiRecoverySupportPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **recovery_support_request** | [**\VaultumSDK\Model\RecoverySupportRequest**](../Model/RecoverySupportRequest.md)|  | |

### Return type

[**\VaultumSDK\Model\RecoveryResponse**](../Model/RecoveryResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
