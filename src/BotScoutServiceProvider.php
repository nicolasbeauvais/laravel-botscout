<?php

namespace NicolasBeauvais\LaravelBotScout;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use NicolasBeauvais\BotScout\BotScout as BotScoutClient;

class BotScoutServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if (app()->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/botscout.php' => config_path('botscout.php'),
            ], 'config');
        }

        app('validator')->extend('botscout_name', 'NicolasBeauvais\LaravelBotScout\BotScoutValidator@validateName');
        app('validator')->extend('botscout_mail', 'NicolasBeauvais\LaravelBotScout\BotScoutValidator@validateMail');
        app('validator')->extend('botscout_ip', 'NicolasBeauvais\LaravelBotScout\BotScoutValidator@validateIp');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/botscout.php', 'botscout');

        $this->app->singleton('laravel-botscout', function (...$arguments) {
            return new BotScout(new BotScoutClient(new Client(), config('botscout.api_key')));
        });
    }
}
