<?php

namespace ahmedmaher\crud\builder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class helperBuilder
{
    public static  function makeMigration($table){
        Artisan::call('make:migration ' . $table);
    }

    public static function makeModel($table, $model){
        $directory = base_path('app/Models');
        $newfilePath = base_path('app/Models/' . $model . '.php');
        $copyfilePath = base_path('app/CrudGenerate/model.txt');
        self::copy_file($directory, $newfilePath, $copyfilePath, $table, $model);
    }

    public static function makeRequest($table){
        $createRequestPath = $table . '/' . 'CreateRequest';
        $editRequestPath = $table . '/' . 'EditRequest';
        Artisan::call('make:request ' . $createRequestPath);
        Artisan::call('make:request ' . $editRequestPath);
    }

    public static function makeViews($table, $model, $path){
        $directory = base_path('resources/views/'. $path . '/' . $table);

        $newIndexfilePath = base_path('resources/views/' . $path  . '/' . $table . '/index.blade.php');
        $copyfilePath = base_path('app/CrudGenerate/CrudViews/index.blade.php');
        self::copy_file($directory, $newIndexfilePath, $copyfilePath, $table, $model);
        
        $newCreatefilePath = base_path('resources/views/' . $path  . '/' . $table . '/create.blade.php');
        $copyfilePath = base_path('app/CrudGenerate/CrudViews/create.blade.php');
        self::copy_file($directory, $newCreatefilePath, $copyfilePath, $table, $model);

        $newEditfilePath = base_path('resources/views/' . $path  . '/' . $table . '/edit.blade.php');
        $copyfilePath = base_path('app/CrudGenerate/CrudViews/edit.blade.php');
        self::copy_file($directory, $newEditfilePath, $copyfilePath, $table, $model);

        $newFormfilePath = base_path('resources/views/' . $path  . '/' . $table . '/form.blade.php');
        $copyfilePath = base_path('app/CrudGenerate/CrudViews/form.blade.php');
        self::copy_file($directory, $newFormfilePath, $copyfilePath, $table, $model);
    }

    public static function makeController($table, $model, $path){
        $directory = base_path('app/Http/Controllers/' . $path);
        $newfilePath = base_path('app/Http/Controllers/' . $path . '/'. $model .'Controller.php');
        $copyfilePath = base_path('app/CrudGenerate/controller.txt');
        self::copy_file($directory, $newfilePath, $copyfilePath, $table, $model);
    }

    public function copy_file($directory, $newfilePath, $copyfilePath, $table, $model){
        File::makeDirectory($directory, 0777, true, true);

        //create file
        $newfile = fopen($newfilePath,'w');  

        //take content
        $file_content = file_get_contents($copyfilePath);

        //handel content
        $content = str_replace('@@table@@', $table ,$file_content);      
        $content = str_replace('@@model@@', $model ,$content);
        
        //put content in new file
        fwrite($newfile, $content);
        fclose($newfile);
    }
}
