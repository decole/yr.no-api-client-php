<?php

namespace Decole\YrNo\Actions;

use GuzzleHttp\Client;
use Decole\YrNo\Configuration;
use Psr\Http\Message\StreamInterface;
use GuzzleHttp\Exception\GuzzleException;

class Location
{
    /**
     * The HTTP client.
     */
    protected Client $client;

    /**
     * @var Configuration
     */
    protected Configuration $configuration;

    /**
     * @var string|null
     */
    private ?string $location;

    /**
     * @var string|null
     */
    private ?string $lang;

    public function __construct(Client $client, Configuration $configuration)
    {
        $this->client = $client;
        $this->configuration = $configuration;
        $this->location = $this->configuration->getLocation();
        $this->lang = $this->configuration->getLanguage();
    }

    /**
     * @return StreamInterface
     * @throws GuzzleException
     */
    public function get(): StreamInterface
    {
        return $this->client->request('GET', "locations/{$this->location}?language={$this->lang}")->getBody();
    }

    /**
     * @return StreamInterface
     * @throws GuzzleException
     */
    public function foreCast(): StreamInterface
    {
        return $this->client->request('GET', "locations/{$this->location}/forecast")->getBody();
    }

    /**
     * @return StreamInterface
     * @throws GuzzleException
     */
    public function currentHour(): StreamInterface
    {
        return $this->client->request('GET', "locations/{$this->location}/forecast/currenthour")->getBody();
    }

    /**
     * @return StreamInterface
     * @throws GuzzleException
     */
    public function celestialEvents(): StreamInterface
    {
        return $this->client->request('GET', "locations/{$this->location}/celestialevents")->getBody();
    }

    /**
     * @param string|null $query
     * @return StreamInterface
     * @throws GuzzleException
     */
    public function suggest(?string $query): StreamInterface
    {
        return $this->client->request('GET', "locations/suggest?language={$this->lang}&q={$query}")->getBody();
    }
}
