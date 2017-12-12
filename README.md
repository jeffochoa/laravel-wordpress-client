# Wordpress json-api client for Laravel 5.5.*
A small client to request data from a wordpress project using the built-in JSON api.

## About
This package uses [kitetail/zttp](https://github.com/kitetail/zttp) which is a lightweight [Guzzle](https://github.com/guzzle/guzzle) client.

## Install
```bash
$ composer require jeffochoa/laravel-wordpress-client
```

## Config
Publish the config file:
```bash
$ php artisan vendor:publish --laravel-wordpress
```

Add your wordpress site API endpoint to the `.env` file
```text
WP_API_URL=
```


## How to use?
Here you have a list of  the available methods:

```php
$wordpress = new WordpressClient();

$response = $wordpress->categories();
$response = $wordpress->media();
$response = $wordpress->pages();
$response = $wordpress->posts();
$response = $wordpress->statuses();
$response = $wordpress->tags();
$response = $wordpress->taxonomies();
$response = $wordpress->types();
$response = $wordpress->users();
```

### Using via facade accessor
```php
$response = Wordpress::categories();
```

### Request params
All the methods receive an array to be use as part of the query
```php
$response = Wordpress::posts(['page' => 1, 'per_page' => 1]);
```

[Here](https://developer.wordpress.org/rest-api/reference/posts/#list-posts) you can get a list of the arguments that you can use on each request.

### Parsing the responses
As an array:
```php
$response = Wordpress::posts(['page' => 1, 'per_page' => 1])->json();
```

As a collection:
```php
$response = Wordpress::posts(['page' => 1, 'per_page' => 1])->collection();
```

## Testing
To run the tests you can clone this project then:

```bash
$ composer install
```

And finally you need to create your own `phpunit.xml` file
```bash
$ cp phpunit.example phpunit.xml
```

Don't forget to set the wordpress api endpoint in your `phpunit.xml` file
```xml
<env name="WP_API_URL" value="www.wordpress.dev/wp-json/wp/v2"/>
```

# Contribute
Pull requests and issues are welcome.

## Thanks!
Say hi on twitter: [@Jeffer_8a](https://twitter.com/Jeffer_8a)
