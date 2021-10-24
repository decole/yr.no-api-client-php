<?php

namespace Decole\YrNo\Actions;

use GuzzleHttp\Client;
use Decole\YrNo\Configuration;
use Psr\Http\Message\StreamInterface;
use GuzzleHttp\Exception\GuzzleException;

class ServiceAnnouncement
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
     * Select language in yr.no
     *
     * @return StreamInterface
     * @throws GuzzleException
     */
    public function get(): StreamInterface
    {
        return $this->client->request('GET', "serviceannouncements/web?language={$this->lang}")->getBody();
    }
}
