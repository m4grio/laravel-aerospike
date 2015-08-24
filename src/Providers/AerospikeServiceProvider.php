<?php

namespace Magrio\Laravel\Providers;

use Aerospike;
use Illuminate\Support\ServiceProvider;

/**
 * Aerospike Service Provider
 *
 * @package Magrio\Providers
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
class AerospikeServiceProvider extends ServiceProvider
{
    /**
     * Deferred load
     *
     * @var bool
     */
    protected $defer = true;

    const PROVIDES = 'aerospike';

    /**
     * Boots the provider
     *
     * @return void
     */
    public function boot()
    {
        $this->bootConfig();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(static::PROVIDES, function ($app) {
            $config = $app['config'][static::PROVIDES];
            $as = new Aerospike($config['client'], $config['persistent'], $config['options']);

            return $as;
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [static::PROVIDES];
    }

    /**
     * Merge vendor with local configs
     *
     * @return $this
     */
    protected function bootConfig()
    {
        $source = realpath(__DIR__.'/../config/aerospike.php');
        $this->mergeConfigFrom($source, static::PROVIDES);

        return $this;
    }
}
