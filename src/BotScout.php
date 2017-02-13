<?php

namespace NicolasBeauvais\LaravelBotScout;

use NicolasBeauvais\BotScout\BotScout as BotScoutClient;

class BotScout
{
    /** @var BotScoutClient */
    protected $botScoutClient;

    /**
     * BotScout constructor.
     *
     * @param BotScoutClient $client
     */
    public function __construct(BotScoutClient $client)
    {
        $this->botScoutClient = $client;
    }

    /**
     * Test matches all parameters at once.
     *
     * @param string $name
     * @param string $mail
     * @param string $ip
     *
     * @return \NicolasBeauvais\BotScout\BotScoutResponse
     */
    public function multi(string $name = null, string $mail = null, string $ip = null)
    {
        return $this->botScoutClient->multi($name, $mail, $ip);
    }

    /**
     * Test matches a single item against all fields in the botscout database.
     *
     * @param string $all
     *
     * @return \NicolasBeauvais\BotScout\BotScoutResponse
     */
    public function all(string $all)
    {
        return $this->botScoutClient->all($all);
    }

    /**
     * Test matches a name.
     *
     * @param string $name
     *
     * @return \NicolasBeauvais\BotScout\BotScoutResponse
     */
    public function name(string $name = null)
    {
        return $this->botScoutClient->name($name);
    }

    /**
     * Test matches an email.
     *
     * @param string $mail
     *
     * @return \NicolasBeauvais\BotScout\BotScoutResponse
     */
    public function mail(string $mail = null)
    {
        return $this->botScoutClient->mail($mail);
    }

    /**
     * Test matches an ip.
     *
     * @param string $ip
     *
     * @return \NicolasBeauvais\BotScout\BotScoutResponse
     */
    public function ip(string $ip = null)
    {
        return $this->botScoutClient->ip($ip);
    }
}
