# Installation

1 - Install
```
composer require ahmedmaher/crud
```


2 - Add the service provider to the providers array in the config/app.php config file as follows:
```
'providers' => [

    ...

    ahmedmaher\crud\CrudServiceProvide::class,
]
```


3- Publish the default package
```
php artisan vendor:publish --provider="ahmedmaher\crud\CrudServiceProvider"
```

# Usage
to put you view code in index, create, edit and form edit in ``` App/CrudGenerate/CrudViews ```

to set or edit default properties or methods in model edit in ``` App/CrudGenerate/model.php ```

run this command
```
php artisan crud:generate {table} {model} {path}

php artisan crud:generate products Product Dashboard/folder
```
