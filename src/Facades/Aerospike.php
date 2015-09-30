<?php

namespace m4grio\LaravelAerospike\Facades;

use Illuminate\Support\Facades\Facade;
use m4grio\LaravelAerospike\Providers\AerospikeServiceProvider;

/**
 * Aerospike Facade
 *
 * @package Magrio\Laravel\Facades
 * @author  Mario Álvarez <ahoy@m4grio.me>
 */
class Aerospike extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return AerospikeServiceProvider::PROVIDES;
    }
}
