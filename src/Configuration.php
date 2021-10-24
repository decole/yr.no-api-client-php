<?php

namespace Decole\YrNo;

class Configuration
{
    /**
     * yr.no base API URL
     */
    protected string $baseApiUrl = 'https://www.yr.no/api/v0/';

    /**
     * yr.no location
     */
    protected ?string $location = null;

    /**
     * yr.no language
     */
    protected ?string $language;

    /**
     * Get base API URL
     *
     * @return string
     */
    public function getBaseApiUrl(): string
    {
        return $this->baseApiUrl;
    }

    /**
     * Set base API URL.
     *
     * @param string $baseApiUrl
     */
    public function setBaseApiUrl(string $baseApiUrl): void
    {
        $this->baseApiUrl = $baseApiUrl;
    }

    /**
     * Get current location
     *
     * @return string
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * Set current location
     *
     * @param string|null $location
     */
    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    /**
     * Get current language
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * Set current language
     *
     * @param string|null $language
     */
    public function setLanguage(?string $language)
    {
        $this->language = $language;
    }
}
