<?php

namespace NicolasBeauvais\LaravelBotScout\Test;

use Orchestra\Testbench\TestCase as Orchestra;
use NicolasBeauvais\LaravelBotScout\BotScoutFacade;
use NicolasBeauvais\LaravelBotScout\BotScoutServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [BotScoutServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'BotScout' => BotScoutFacade::class,
        ];
    }
}
