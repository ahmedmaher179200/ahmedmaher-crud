<?php

namespace ahmedmaher\crud\builder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class helperBuilder
{
    public static  function makeMigration($table){
        Artisan::call('make:migration ' . $table);
    }
}
