<?php namespace Bluemove\Sepa;

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
		$this->package('bluemove/sepa');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Register 'underlyingclass' instance container to our UnderlyingClass object
		$this->app['sepa'] = $this->app->share(function($app)
		{
			return new \Bluemove\Sepa\Sepa;
		});



		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Sepa', 'Bluemove\Sepa\Facades\Sepa');
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
