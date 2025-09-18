# VaultumSDK\SpendingLimitsApi

All URIs are relative to https://api.vaultum.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**apiLimitsAccountStatusGet()**](SpendingLimitsApi.md#apiLimitsAccountStatusGet) | **GET** /api/limits/{account}/status | Get spending limits |
| [**apiLimitsBypassPost()**](SpendingLimitsApi.md#apiLimitsBypassPost) | **POST** /api/limits/bypass | Toggle owner bypass |
| [**apiLimitsSetPost()**](SpendingLimitsApi.md#apiLimitsSetPost) | **POST** /api/limits/set | Set spending limit |


## `apiLimitsAccountStatusGet()`

```php
apiLimitsAccountStatusGet($account): \VaultumSDK\Model\SpendingLimitsStatus
```

Get spending limits

Get all spending limits for an account

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\SpendingLimitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account = 'account_example'; // string

try {
    $result = $apiInstance->apiLimitsAccountStatusGet($account);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SpendingLimitsApi->apiLimitsAccountStatusGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account** | **string**|  | |

### Return type

[**\VaultumSDK\Model\SpendingLimitsStatus**](../Model/SpendingLimitsStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiLimitsBypassPost()`

```php
apiLimitsBypassPost($bypass_toggle_request): \VaultumSDK\Model\BypassStatusResponse
```

Toggle owner bypass

Enable or disable owner bypass for spending limits

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\SpendingLimitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bypass_toggle_request = new \VaultumSDK\Model\BypassToggleRequest(); // \VaultumSDK\Model\BypassToggleRequest

try {
    $result = $apiInstance->apiLimitsBypassPost($bypass_toggle_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SpendingLimitsApi->apiLimitsBypassPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bypass_toggle_request** | [**\VaultumSDK\Model\BypassToggleRequest**](../Model/BypassToggleRequest.md)|  | |

### Return type

[**\VaultumSDK\Model\BypassStatusResponse**](../Model/BypassStatusResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiLimitsSetPost()`

```php
apiLimitsSetPost($spending_limit_request): \VaultumSDK\Model\SpendingLimitResponse
```

Set spending limit

Set spending limit for a token

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\SpendingLimitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$spending_limit_request = new \VaultumSDK\Model\SpendingLimitRequest(); // \VaultumSDK\Model\SpendingLimitRequest

try {
    $result = $apiInstance->apiLimitsSetPost($spending_limit_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SpendingLimitsApi->apiLimitsSetPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **spending_limit_request** | [**\VaultumSDK\Model\SpendingLimitRequest**](../Model/SpendingLimitRequest.md)|  | |

### Return type

[**\VaultumSDK\Model\SpendingLimitResponse**](../Model/SpendingLimitResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
