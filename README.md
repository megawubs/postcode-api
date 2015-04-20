Laravel Postcode API
==========
This is a simple laravel package to use the dutch postcode api. 

It's laravel usage is like this:
```PHP
<?php
Zip::address("1234AA", 11);
```

## Installation

To install this library into your project simply do the following in your project root:

```bash
composer require wubs/zip:1.1.*
```

And add `'Wubs\Zip\ZipServiceProvider',` to `app/config.php` in the providers array. And add `'Zip' => 
'Wubs\Zip\Facades\Zip',` to the aliases array.

### Non laravel usage

The package is also usable without Laravel. See the code below. 

```PHP
<?php
require 'vendor/autoload.php'

use Wubs\Zip\ZipApi;

$zipApi = new ZipApi("API_KEY");
$address = $postcodeApi->address("1234AA", 11);
```


