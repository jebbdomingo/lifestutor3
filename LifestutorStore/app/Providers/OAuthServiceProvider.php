<?php

namespace App\Providers;

use Dingo\Api\Auth\Auth;
use Dingo\Api\Auth\Provider\OAuth2;
use Illuminate\Support\ServiceProvider;
use Services\User\Data\Repositories\UserRepository;

class OAuthServiceProvider extends ServiceProvider
{
    public function boot(UserRepository $repository)
    {
        $this->app[Auth::class]->extend('oauth', function ($app) use ($repository) {
            $provider = new OAuth2($app['oauth2-server.authorizer']->getChecker());

            $provider->setUserResolver(function ($id) use ($repository) {
                // Logic to return a user by their ID.
                return $repository->get($id);
            });

            /*$provider->setClientResolver(function ($id) {
                // Logic to return a client by their ID.
                return new \stdClass;
            });*/

            return $provider;
        });
    }

    public function register()
    {
        //
    }
}