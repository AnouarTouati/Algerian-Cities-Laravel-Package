<?php

namespace AnouarTouati\AlgerianCitiesLaravel\Facades;

use AnouarTouati\AlgerianCitiesLaravel\AlgerianCities;
use Illuminate\Support\Facades\Facade;
class AlgerianCitiesFacade extends Facade {
/**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return AlgerianCities::class;
    }
}