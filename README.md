Laravel PredictionIO
====================


*Based on [michaeljhopkins](https://github.com/michaeljhopkins/PredictionIO-Laravel-Wrapper)


The Laravel PredictionIO library provides a client which offers easy access to a PredictionIO recommendation engine.
PredictionIO is an open source machine learning server for software developers to create predictive features, such as
personalization, recommendation and content discovery.

Through a small set of simple calls, all server functionality is exposed to your application. You can add users and items,
register actions between these users and items and retrieve recommendations deduced from this information by any
[`PredictionIO`](http://prediction.io/) recommendation engine. Applications range from showing recommended products in a
web shop to discovering relevant experts in a social collaboration network.


## Installation
* Install library and dependencies:

```bash
$ composer require "linkthrow/laravel-5-predictionio"
```

* Add a **provider** in `app/config/app.php`:

```php
    LinkThrow\LaravelPredictionIO\Provider\PredictionIOServiceProvider::class
```

* Add an **alias** in `app/config/app.php`:

```php
    'EngineClient'      => LinkThrow\LaravelPredictionIO\Facades\EngineFacade::class,
        'EventClient'       => LinkThrow\LaravelPredictionIO\Facades\EventFacade::class,
```

* Define your [PredictionIO API endpoint](http://docs.prediction.io/current/tutorials/quickstart-php.html#add-your-app-to-predictionio) in `app/config/services.php`:

```php
	'predictionio' => [
		'key' => '0250b3f85ce33284f77c77f36b41010ef2c4fc5c',
		'url' => 'http://localhost:7200'
	],
```

Set a User Record from Your App
-------------------------------

```PHP
// assume you have a user with user ID 5
$response = EventClient::setUser(5);
```


Set an Item Record from Your App
---------------------------------

```PHP
// assume you have a book with ID 'bookId1' and we assign 1 as the type ID for book
$response = EventClient::setItem('bookId1', array('itypes' => 1));
```


Import a User Action (View) form Your App
-----------------------------------------

```PHP
// assume this user has viewed this book item
EventClient::recordUserActionOnItem('view', 5, 'bookId1');
```


Retrieving Prediction Result
----------------------------

```PHP
// assume you have created an itemrank engine on localhost:8000
// we try to get ranking of 5 items (item IDs: 1, 2, 3, 4, 5) for a user (user ID 7)

$response = EngineClient::sendQuery(array('uid'=>7, 'iids'=>array(1,2,3,4,5)));

print_r($response);
```


# License

This project is licensed using [DBAD](http://www.dbad-license.org/). Go have a blast.

