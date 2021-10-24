<?php

namespace Decole\YrNo\Adapters\Laravel\Facades;

use Decole\YrNo\YrNoClient;
use Illuminate\Support\Facades\Facade;

class YrNoFacade extends Facade
{
    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return YrNoClient::class;
    }
}
