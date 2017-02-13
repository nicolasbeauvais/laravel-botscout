<?php

namespace NicolasBeauvais\LaravelBotScout\Test;

use Mockery;
use NicolasBeauvais\BotScout\BotScout as BotScoutClient;
use NicolasBeauvais\BotScout\BotScoutResponse;
use NicolasBeauvais\LaravelBotScout\BotScout;

class BotScoutTest extends TestCase
{
    /** @var  \Mockery\MockInterface */
    protected $botScoutClient;

    /** @var  BotScout */
    protected $botScout;

    /** @var  BotScoutResponse */
    protected $fakeResponse;

    /** @var  array */
    protected $arguments;

    public function setUp()
    {
        parent::setUpBeforeClass();

        $this->arguments = ['John Doe', 'email@test.com', '127.0.0.1'];
        $this->fakeResponse = new BotScoutResponse('Y|ALL|2|MAIL');

        $this->botScoutClient = Mockery::mock(BotScoutClient::class);
        $this->botScout = new BotScout($this->botScoutClient);
    }

    public function test_multi()
    {
        $this->botScoutClient->shouldReceive('multi')
            ->withArgs($this->arguments)
            ->once()
            ->andReturn($this->fakeResponse);

        $response = $this->botScout->multi($this->arguments[0], $this->arguments[1], $this->arguments[2]);

        $this->assertInstanceOf(BotScoutResponse::class, $response);
    }

    public function test_all()
    {
        $this->botScoutClient->shouldReceive('all')
            ->withArgs([$this->arguments[0]])
            ->once()
            ->andReturn($this->fakeResponse);

        $response = $this->botScout->all($this->arguments[0]);

        $this->assertInstanceOf(BotScoutResponse::class, $response);
    }

    public function test_name()
    {
        $this->botScoutClient->shouldReceive('name')
            ->withArgs([$this->arguments[0]])
            ->once()
            ->andReturn($this->fakeResponse);

        $response = $this->botScout->name($this->arguments[0]);

        $this->assertInstanceOf(BotScoutResponse::class, $response);
    }

    public function test_mail()
    {
        $this->botScoutClient->shouldReceive('mail')
            ->withArgs([$this->arguments[1]])
            ->once()
            ->andReturn($this->fakeResponse);

        $response = $this->botScout->mail($this->arguments[1]);

        $this->assertInstanceOf(BotScoutResponse::class, $response);
    }

    public function test_ip()
    {
        $this->botScoutClient->shouldReceive('ip')
            ->withArgs([$this->arguments[2]])
            ->once()
            ->andReturn($this->fakeResponse);

        $response = $this->botScout->ip($this->arguments[2]);

        $this->assertInstanceOf(BotScoutResponse::class, $response);
    }
}
