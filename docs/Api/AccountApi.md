# VaultumSDK\AccountApi

All URIs are relative to https://api.vaultum.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**apiAccountDeployPost()**](AccountApi.md#apiAccountDeployPost) | **POST** /api/account/deploy | Deploy a new smart account |


## `apiAccountDeployPost()`

```php
apiAccountDeployPost($deploy_request): \VaultumSDK\Model\DeployResponse
```

Deploy a new smart account

Deploy a new smart account with initial modules

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = VaultumSDK\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new VaultumSDK\Api\AccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$deploy_request = new \VaultumSDK\Model\DeployRequest(); // \VaultumSDK\Model\DeployRequest

try {
    $result = $apiInstance->apiAccountDeployPost($deploy_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->apiAccountDeployPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deploy_request** | [**\VaultumSDK\Model\DeployRequest**](../Model/DeployRequest.md)|  | |

### Return type

[**\VaultumSDK\Model\DeployResponse**](../Model/DeployResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
