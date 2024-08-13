<?php
namespace Iantoo\LaravelExcuses;

use Illuminate\Support\ServiceProvider;
use Iantoo\LaravelExcuses\Commands\ExcuseCommand;

class ExcuseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('excuse', function () {
            return new Excuse();
        });
    }

    public function boot()
    {
        if($this->app->runningInConsole()){
            $this->commands([
                ExcuseCommand::class,
            ]);

            // Publish the configuration file
            $this->publishes([
                __DIR__ . '/../config/excuses.php' => config_path('excuses.php'),
            ], 'config');

        }
    }
}