<?php
namespace Services\Cart\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;
use Doctrine\ORM\Mapping\ClassMetadata;
use Services\Cart\Data\Repositories\DoctrineCartRepository;
use Services\Cart\Data\Repositories\CartRepository;
use Services\Cart\Data\Entities\Cart\Cart;

class CartServiceProvider extends ServiceProvider
{
	/**
	 * Register the Cart module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('Services\Cart\Providers\RouteServiceProvider');

		$this->registerNamespaces();

		// Find CartRepository
		$this->app->bind(CartRepository::class, function($app) {
			return new DoctrineCartRepository(
				$app['em'],
				new ClassMetaData(Cart::class)
			);
		});
	}

	/**
	 * Register the Cart module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('cart', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('cart', realpath(__DIR__.'/../Resources/Views'));
	}
}
