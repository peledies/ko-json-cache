# json-cache

This module is built for caching responses from API's in a file. Its primary focus is on alleviating pressure from an API when data is not required to be up to the second. This is particularly useful when the API may have throttling or rate limiting in use.

## Install
```php
composer require ko/json-cache
```

## Properties
| Property | Type | Description |
| -------- | ---- | ----------- |
| validity | Integer | Number of minutes the cache will be used before being declared invalid [ Default 15 ]|
| file | String | The path of the json cache file [ Default json-cache.json ]


## Usage

Build the cache settings object
```php
  $KOCacheSettings = new \KO\Cache\Settings();
  $KOCacheSettings->setValidity(15);
  $KOCacheSettings->setFile('data_cache.json');
```

Instantiate a new cache object with the settings
```php
  $KOCache = new \KO\Cache\Cache($KOCacheSettings);
```

## Documentation

See the full [Documentation](http://ko.karnsonline.com/json-cache) for more details.