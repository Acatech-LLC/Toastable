<?php

namespace Acatech\Toastable;

use Illuminate\Support\Facades\Facade;

class Toastable extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'toastable';
    }
}
