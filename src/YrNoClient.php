<?php

namespace Decole\YrNo;

use GuzzleHttp\Client;

class YrNoClient
{
    /**
     * The HTTP client.
     * @var Client
     */
    protected Client $client;

    /**
     * The configuration parameters.
     * @var Configuration
     */
    public Configuration $configuration;

    /**
     * @var Actions\Location|null
     */
    private ?Actions\Location $location = null;

    /**
     * @var Actions\Article|null
     */
    private ?Actions\Article $article = null;

    /**
     * @var Actions\Region|null
     */
    private ?Actions\Region $region = null;

    /**
     * @var Actions\ServiceAnnouncement|null
     */
    private ?Actions\ServiceAnnouncement $announcement = null;

    public function __construct(
        ?string $location = null,
        ?string $language = null,
        ?Client $client = null,
        ?Configuration $configuration = null
    ) {
        $this->configuration = $configuration ?? new Configuration();
        $this->configuration->setLocation($location);
        $this->configuration->setLanguage($language);
        $this->client = $client ?? new Client([
            'base_uri' => $this->configuration->getBaseApiUrl(),
            'timeout'  => 2.0,
        ]);
    }

    public function location(): Actions\Location
    {
        if (!$this->location) {
            $this->location = new Actions\Location($this->client, $this->configuration);
        }

        return $this->location;
    }

    public function article(): Actions\Article
    {
        if (!$this->article) {
            $this->article = new Actions\Article($this->client, $this->configuration);
        }

        return $this->article;
    }

    public function region(): Actions\Region
    {
        if (!$this->region) {
            $this->region = new Actions\Region($this->client, $this->configuration);
        }

        return $this->region;
    }

    public function serviceAnnouncement(): Actions\ServiceAnnouncement
    {
        if (!$this->announcement) {
            $this->announcement = new Actions\ServiceAnnouncement($this->client, $this->configuration);
        }

        return $this->announcement;
    }
}
