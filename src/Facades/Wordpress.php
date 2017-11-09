<?php

namespace WordpressClient\Facades;

use WordpressClient\WordpressClient;

class Wordpress extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return WordpressClient::class;
    }
}
