<?php

namespace Magrio\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Magrio\Laravel\Providers\AerospikeServiceProvider;

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
