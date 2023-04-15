<?php

namespace ahmedmaher\crud;

use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/Commands' => base_path('app/Console/Commands')]);
        $this->publishes([__DIR__ . '/Views' => base_path('app/CrudGenerate/CrudViews')]);
        $this->publishes([__DIR__ . '/Classes' => base_path('app/CrudGenerate')]);
    }
}
