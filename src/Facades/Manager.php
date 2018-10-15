<?php

namespace Depakespedro\LaravelAuthUrl\Facades;

use Illuminate\Support\Facades\Facade;
use Depakespedro\LaravelAuthUrl\Contracts\AuthUrlContract;

class Manager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return AuthUrlContract::class; }
}