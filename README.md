# Yr.no API Client PHP

A client library written in PHP with Laravel support.

> This library uses unofficial publicly accessible API endpoints of the website https://www.yr.no, so keep in mind that some endpoints could stop working anytime. Anyway, open an issue if something is broken or missing.

Optionally, if you use **Laravel**, you can publish the config file of this package with this command:

``` bash
$ php artisan vendor:publish --provider="Decole\YrNo\Adapters\Laravel\YrNoServiceProvider" --tag=config
```

## Configuration
The following config file will be published in `config/yrno.php`, set `location` and `language`. Example configuration is already set in the default settings.

```php
return [  
    'location' => '2-553287',
    'language' => 'en',
];
```

## Possible languages:
```
 'language' => 'nb', - Ireland
 'language' => 'nn', - Norwegian
 'language' => 'en', - English
```

## Find city location id by city name. For example, it`s 'moscow'
```php
(new YrNoClient('2-553287', 'en'))->location()->suggest('moscow');
```

Response: you need to find the will **"id"**. In this example, this is **2-553287**

> find id:  **_embedded** -> **location** -> object element -> **id**  -  ("2-524901") 
> 
> find region:  **_embedded** -> **location** -> object element -> **region** -> **id**  -  ("RU/48")

Response json:
```json
{
  "totalResults": 5,
  "_links": {
    "self": {
      "href": "/api/v0/locations"
    },
    "page": {
      "href": "/api/v0/locations{?page}",
      "templated": true
    },
    "search": {
      "href": "/api/v0/locations/search{?q}",
      "templated": true
    },
    "location": [
      {
        "href": "/api/v0/locations/2-524901"
      },
      ...
    ]
  },
  "_embedded": {
    "location": [
      {
        "category": {
          "id": "CA01",
          "name": "Capital"
        },
        "id": "2-524901",
        "name": "Moscow",
        "position": {
          "lat": 55.75222,
          "lon": 37.61556
        },
        "elevation": 144,
        "timeZone": "Europe/Moscow",
        "urlPath": "Russia/Moscow/Moscow",
        "country": {
          "id": "RU",
          "name": "Russia"
        },
        "region": {
          "id": "RU/48",
          "name": "Moscow"
        },
        "isInOcean": false,
        "_links": {
          "self": {
            "href": "/api/v0/locations/2-524901"
          },
          "celestialevents": {
            "href": "/api/v0/locations/2-524901/celestialevents"
          },
          "forecast": {
            "href": "/api/v0/locations/2-524901/forecast"
          },
          "mapfeature": {
            "href": "/api/v0/locations/2-524901/mapfeature"
          },
          "currenthour": {
            "href": "/api/v0/locations/2-524901/forecast/currenthour"
          },
          "observations": {
            "href": "/api/v0/locations/2-524901/observations"
          },
          "auroraforecast": {
            "href": "/api/v0/locations/2-524901/auroraforecast"
          }
        }
      },
      ...
    ]
  }
}
```

## How to use

Example:
```php
use Decole\YrNo\YrNoClient;

$location = '2-553287';  
$lang = 'en';  
$api = new YrNoClient($location, $lang);  
$data = $api->location()->suggest('moscow'); // Read on to explore all available methods
```

## API methods using Laravel facades:

**Location**
```php
//Get locations by current city
YrNoClient::location()->get();

//Forecast by current city
YrNoClient::location()->foreCast();

//Weather forecast current hour by current city
YrNoClient::location()->currentHour();

//Celestial events by current city
YrNoClient::location()->celestialEvents();

//Search city id, region id and another city params 
YrNoClient::location()->suggest('some city');
```

**Article**
```php
//get article
YrNoClient::article()->get();
```

**Region**
```php
//Get region by region id
YrNoClient::region()->get('NO');

//Get region water temperatures
YrNoClient::region()->waterTemperatures('NO-42');
```

**ServiceAnnouncement**
```php
//Service Announcement app by yr.no cite
YrNoClient::serviceAnnouncement()->get();
```

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
