<?php

namespace NicolasBeauvais\LaravelBotScout;

class BotScoutValidator
{
    /** @var  BotScout */
    protected $botScout;

    /**
     * BotScoutValidator constructor.
     */
    public function __construct()
    {
        $this->botScout = app('laravel-botscout');
    }

    public function validateName($message, $attribute, $rule, $parameters) : bool
    {
        return $this->botScout->name($attribute)->isValid();
    }

    public function validateMail($message, $attribute, $rule, $parameters) : bool
    {
        return $this->botScout->mail($attribute)->isValid();
    }

    public function validateIp($message, $attribute, $rule, $parameters) : bool
    {
        return $this->botScout->ip($attribute)->isValid();
    }
}
