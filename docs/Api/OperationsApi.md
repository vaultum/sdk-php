# VaultumSDK\OperationsApi

All URIs are relative to https://api.vaultum.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**apiOpIdGet()**](OperationsApi.md#apiOpIdGet) | **GET** /api/op/{id} | Get operation status |
| [**apiOpIdWaitGet()**](OperationsApi.md#apiOpIdWaitGet) | **GET** /api/op/{id}/wait | Wait for operation completion |
| [**apiOpSubmitPost()**](OperationsApi.md#apiOpSubmitPost) | **POST** /api/op/submit | Submit a UserOperation |


## `apiOpIdGet()`

```php
apiOpIdGet($id): \VaultumSDK\Model\OperationStatus
```

Get operation status

Check the status of a submitted operation

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->apiOpIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->apiOpIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\VaultumSDK\Model\OperationStatus**](../Model/OperationStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiOpIdWaitGet()`

```php
apiOpIdWaitGet($id, $timeout): \VaultumSDK\Model\OperationStatus
```

Wait for operation completion

Long-poll endpoint that waits for operation to complete

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$timeout = 30; // int

try {
    $result = $apiInstance->apiOpIdWaitGet($id, $timeout);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->apiOpIdWaitGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **timeout** | **int**|  | [optional] [default to 30] |

### Return type

[**\VaultumSDK\Model\OperationStatus**](../Model/OperationStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiOpSubmitPost()`

```php
apiOpSubmitPost($submit_request): \VaultumSDK\Model\SubmitResponse
```

Submit a UserOperation

Submit a signed UserOperation to the bundler

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$submit_request = new \VaultumSDK\Model\SubmitRequest(); // \VaultumSDK\Model\SubmitRequest

try {
    $result = $apiInstance->apiOpSubmitPost($submit_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->apiOpSubmitPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **submit_request** | [**\VaultumSDK\Model\SubmitRequest**](../Model/SubmitRequest.md)|  | |

### Return type

[**\VaultumSDK\Model\SubmitResponse**](../Model/SubmitResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
