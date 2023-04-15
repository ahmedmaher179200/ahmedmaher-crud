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
        $newfile = fopen(base_path('app/Models/' . $model . '.php'),'w');       //create model
        $file_content = file_get_contents(base_path('app/CrudGenerate/model.php'));  //take content
        $content = str_replace('@@table@@', $table ,$file_content);      //handel content
        $content = str_replace('@@model@@', $model ,$content);      //handel content
        fwrite($newfile, $content);
        fclose($newfile);
    }

    public static function makeRequest($table){
        $createRequestPath = $table . '/' . 'CreateRequest';
        $editRequestPath = $table . '/' . 'EditRequest';
        Artisan::call('make:request ' . $createRequestPath);
        Artisan::call('make:request ' . $editRequestPath);
    }

    public static function makeViews($table, $path){
        File::makeDirectory(base_path('resources/views/'. $path . '/' . $table), 0777, true, true);
        
        $indexViewPath = base_path('resources/views/' . $path  . '/' . $table . '/index.blade.php');
        $createViewPath = base_path('resources/views/' . $path  . '/' . $table . '/create.blade.php');
        $editViewPath = base_path('resources/views/' . $path  . '/' . $table . '/edit.blade.php');;
        $formViewPath = base_path('resources/views/' . $path  . '/' . $table . '/form.blade.php');;
        copy(base_path('app/CrudGenerate/CrudViews/index.blade.php'), $indexViewPath);
        copy(base_path('app/CrudGenerate/CrudViews/edit.blade.php'), $editViewPath);
        copy(base_path('app/CrudGenerate/CrudViews/create.blade.php'), $createViewPath);
        copy(base_path('app/CrudGenerate/CrudViews/form.blade.php'), $formViewPath);
    }


    public static function makeController($table, $model, $path){
        File::makeDirectory(base_path('app/Http/Controllers/'. $path), 0777, true, true);

        $newfile = fopen(base_path('app/Http/Controllers/' . $path . '/'. $model .'Controller.php'),'w'); //create Controller
        $file_content = file_get_contents(base_path('app/CrudGenerate/controller.php'));  //take content
        $content = str_replace('@@table@@', $table ,$file_content);      //handel content
        $content = str_replace('@@model@@', $model ,$content);      //handel content
        fwrite($newfile, $content);
        fclose($newfile);
    }
}
