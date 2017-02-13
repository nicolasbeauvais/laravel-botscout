<?php

namespace NicolasBeauvais\LaravelBotScout;

use Illuminate\Support\Facades\Facade;

/**
 * @see \NicolasBeauvais\LaravelBotScout\BotScout
 */
class BotScoutFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-botscout';
    }
}
