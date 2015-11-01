<?php
namespace Services\Inventory\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class InventoryServiceProvider extends ServiceProvider
{
	/**
	 * Register the Inventory module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('Services\Inventory\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Inventory module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('inventory', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('inventory', realpath(__DIR__.'/../Resources/Views'));
	}
}
