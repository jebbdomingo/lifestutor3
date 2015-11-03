<?php
namespace Services\User\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;
use Doctrine\ORM\Mapping\ClassMetadata;
use Services\User\Data\Repositories\DoctrineUserRepository;
use Services\User\Data\Repositories\UserRepository;
use Services\User\Data\Entities\User\User;

class UserServiceProvider extends ServiceProvider
{
	/**
	 * Register the User module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('Services\User\Providers\RouteServiceProvider');

		$this->registerNamespaces();

		$this->app->bind(UserRepository::class, function($app) {
			return new DoctrineUserRepository(
				$app['em'],
				new ClassMetaData(User::class)
			);
		});
	}

	/**
	 * Register the User module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('user', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('user', realpath(__DIR__.'/../Resources/Views'));
	}
}
