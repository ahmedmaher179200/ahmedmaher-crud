<?php

namespace App\Console\Commands;

use ahmedmaher\crud\builder\helperBuilder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class crudGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generate {table} {model} {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'handel crud command that you need';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $table = $this->argument('table');
        $model = $this->argument('model');
        $path = $this->argument('path');
        $seperator = '>> ';

        //make migration
        $this->info('make migration...');
        $this->info($seperator);
        helperBuilder::makeMigration($table);

        // make model
        $this->info('make model...');
        $this->info($seperator);
        helperBuilder::makeModel($table, $model);

        $this->info('make request...');
        $this->info($seperator);
        helperBuilder::makeRequest($table);

        $this->info('make views...');
        $this->info($seperator);
        helperBuilder::makeViews($table, $path);

        // make controller
        $this->info('make controller...');
        $this->info($seperator);
        helperBuilder::makeController($table, $model, $path);

        $this->info("crud success.");
    }
}
