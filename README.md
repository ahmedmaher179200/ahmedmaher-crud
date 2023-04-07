# Installation

1 - Install
```
composer require ahmedmaher/crud
```


2 - Add the service provider to the providers array in the config/app.php config file as follows:
```
'providers' => [

    ...

    Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
]
```


3- Publish the default package
```
php artisan vendor:publish --provider="ahmedmaher\crud\CrudServiceProvider"
```
