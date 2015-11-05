<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use EntityManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Register enum type, prevents error in Doctrine schema-tool
         */
        $em = EntityManager::getFacadeRoot();
        $conn = $em->getConnection();
        $conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
