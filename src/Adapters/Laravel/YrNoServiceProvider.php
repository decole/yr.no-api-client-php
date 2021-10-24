<?php

namespace Decole\YrNo\Adapters\Laravel;

use Decole\YrNo\YrNoClient;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class YrNoServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes(
            [
                __DIR__ . '/config/yrno.php' => config_path('yrno.php'),
            ],
            'config',
        );
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(YrNoClient::class, function () {
            return new YrNoClient(config('yrno.location'), config('yrno.language'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [YrNoClient::class];
    }
}
