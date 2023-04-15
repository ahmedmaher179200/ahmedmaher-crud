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
to customize views(index, create, edit and form) edit in ``` App/CrudGenerate/CrudViews ```

to customize mdoel(set or edit default properties or methods) edit in ``` App/CrudGenerate/model.txt ```

to customize controller edit in ``` App/CrudGenerate/controller.txt ```

## and run this command
```
php artisan crud:generate {table} {model} {path}
```

## example
```
php artisan crud:generate products Product Dashboard/folder
```
