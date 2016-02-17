<?php namespace Bluemove\SepaDirectDebits\Facades;

use Illuminate\Support\Facades\Facade;

class Sepa extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sepa';
    }

}