<?php namespace Bluemove\SepaDirectDebits;

use Illuminate\Support\ServiceProvider;

class SepaDirectDebitsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('bluemove/sepadirectdebits');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('Gmaps', 'Bluemove\SepaDirectDebits\Facades\Sepa');
        });
        $this->app['sepa'] = $this->app->share(function ($app) {
            return new Sepa();
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
