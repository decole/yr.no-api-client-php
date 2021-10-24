<?php

namespace Decole\YrNo\Actions;

use GuzzleHttp\Client;
use Decole\YrNo\Configuration;
use Psr\Http\Message\StreamInterface;
use GuzzleHttp\Exception\GuzzleException;

class Region
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
    private ?string $lang;

    public function __construct(Client $client, Configuration $configuration)
    {
        $this->client = $client;
        $this->configuration = $configuration;
        $this->lang = $this->configuration->getLanguage();
    }

    /**
     * example $region = 'NO'
     * @param string $region
     * @return StreamInterface
     * @throws GuzzleException
     */
    public function get(string $region): StreamInterface
    {
        return $this->client->request('GET', "regions/{$region}?language={$this->lang}")->getBody();
    }

    /**
     * example $region = 'NO-42'
     * @param string $region
     * @return StreamInterface
     * @throws GuzzleException
     */
    public function waterTemperatures(string $region): StreamInterface
    {
       return $this->client->request('GET', "regions/{$region}/watertemperatures?language={$this->lang}")->getBody();
    }
}
