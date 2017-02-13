<?php

namespace NicolasBeauvais\LaravelBotScout\Test;

use NicolasBeauvais\LaravelBotScout\BotScoutFacade;
use NicolasBeauvais\LaravelBotScout\BotScoutServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

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
