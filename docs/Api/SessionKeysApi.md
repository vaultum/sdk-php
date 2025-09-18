# VaultumSDK\SessionKeysApi

All URIs are relative to https://api.vaultum.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**apiSessionkeyGrantPost()**](SessionKeysApi.md#apiSessionkeyGrantPost) | **POST** /api/sessionkey/grant | Grant session key |
| [**apiSessionkeyRevokePost()**](SessionKeysApi.md#apiSessionkeyRevokePost) | **POST** /api/sessionkey/revoke | Revoke session key |
| [**apiSessionkeySelectorPut()**](SessionKeysApi.md#apiSessionkeySelectorPut) | **PUT** /api/sessionkey/selector | Update session key selectors |


## `apiSessionkeyGrantPost()`

```php
apiSessionkeyGrantPost($session_key_grant_request): \VaultumSDK\Model\SessionKeyResponse
```

Grant session key

Grant a new session key with expiry and selectors

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\SessionKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$session_key_grant_request = new \VaultumSDK\Model\SessionKeyGrantRequest(); // \VaultumSDK\Model\SessionKeyGrantRequest

try {
    $result = $apiInstance->apiSessionkeyGrantPost($session_key_grant_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SessionKeysApi->apiSessionkeyGrantPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **session_key_grant_request** | [**\VaultumSDK\Model\SessionKeyGrantRequest**](../Model/SessionKeyGrantRequest.md)|  | |

### Return type

[**\VaultumSDK\Model\SessionKeyResponse**](../Model/SessionKeyResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiSessionkeyRevokePost()`

```php
apiSessionkeyRevokePost($session_key_revoke_request): \VaultumSDK\Model\SessionKeyResponse
```

Revoke session key

Revoke an existing session key

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\SessionKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$session_key_revoke_request = new \VaultumSDK\Model\SessionKeyRevokeRequest(); // \VaultumSDK\Model\SessionKeyRevokeRequest

try {
    $result = $apiInstance->apiSessionkeyRevokePost($session_key_revoke_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SessionKeysApi->apiSessionkeyRevokePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **session_key_revoke_request** | [**\VaultumSDK\Model\SessionKeyRevokeRequest**](../Model/SessionKeyRevokeRequest.md)|  | |

### Return type

[**\VaultumSDK\Model\SessionKeyResponse**](../Model/SessionKeyResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiSessionkeySelectorPut()`

```php
apiSessionkeySelectorPut($session_key_selector_request): \VaultumSDK\Model\SessionKeyResponse
```

Update session key selectors

Add or remove allowed selectors for a session key

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\SessionKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$session_key_selector_request = new \VaultumSDK\Model\SessionKeySelectorRequest(); // \VaultumSDK\Model\SessionKeySelectorRequest

try {
    $result = $apiInstance->apiSessionkeySelectorPut($session_key_selector_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SessionKeysApi->apiSessionkeySelectorPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **session_key_selector_request** | [**\VaultumSDK\Model\SessionKeySelectorRequest**](../Model/SessionKeySelectorRequest.md)|  | |

### Return type

[**\VaultumSDK\Model\SessionKeyResponse**](../Model/SessionKeyResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
