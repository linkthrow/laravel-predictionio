<?php namespace LinkThrow\LaravelPredictionIO\Provider;

use Config;
use Illuminate\Support\ServiceProvider;
use predictionio\EngineClient;
use predictionio\EventClient;
use App;

class PredictionIOServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application
     *
     */
    public function boot()
    {
    }

    /**
     * Register to service provider
     *
     */
    public function register()
    {
        $this->app['EventClient'] = $this->app->share(function($app)
        {
            return new EventClient(Config::get('services.predictionio.key'), Config::get('services.predictionio.eventurl'));
        });
        $this->app['EngineClient'] = $this->app->share(function($app)
        {
            return new EngineClient(Config::get('services.predictionio.engineurl'));
        });

    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('EventClient','EngineClient');
    }

}
