<?php

namespace JBernavaPrah\CocktailDB;


use Illuminate\Support\ServiceProvider;

class CocktailDBServiceProvider extends ServiceProvider
{

	protected $deferred = true;

	public function boot()
	{
		$this->setupConfig();
	}

	public function register()
	{
		$this->app->singleton('cocktaildb', function ($app) {
			return new Client(config('cocktaildb.key'));
		});

		$this->app->alias('cocktaildb', Client::class);
	}

	protected function setupConfig()
	{
		$source = realpath(__DIR__ . '/../config/cocktaildb.php');

		if ($this->app instanceof LaravelApplication) {
			$this->publishes([$source => config_path('cocktaildb.php')]);
		} elseif ($this->app instanceof LumenApplication) {
			$this->app->configure('cocktaildb');
		}

		$this->mergeConfigFrom($source, 'cocktaildb');
	}

	/**
	 * Get the services provided by the provider.
	 * @return array
	 */
	public function provides()
	{
		return [Client::class];
	}
}
