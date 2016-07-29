<?php namespace LinkThrow\LaravelPredictionIO\Facades;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class EngineFacade extends IlluminateFacade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'EngineClient'; }


}