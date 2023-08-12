<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\User;
use App\Repositories\UserRepositoryEloquent;

use App\Model\Client_type;
use App\Repositories\Client_typeRepositoryEloquent;

use App\Model\Maintenance;
use App\Repositories\MaintenanceRepositoryEloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // User
        $this->app->bind('App\Repositories\UserRepositoryInterface', 'App\Repositories\UserRepositoryEloquent');

        $this->app->bind('App\Repositories\UserRepositoryInterface', function(){
            return new UserRepositoryEloquent(new User());
        });

        // Client_type
        $this->app->bind('App\Repositories\Client_typeRepositoryInterface', 'App\Repositories\Client_typeRepositoryEloquent');

        $this->app->bind('App\Repositories\Client_typeRepositoryInterface', function(){
            return new Client_typeRepositoryEloquent(new Client_type());
        });

        // Maintenance
        $this->app->bind('App\Repositories\MaintenanceRepositoryInterface', 'App\Repositories\MaintenanceRepositoryEloquent');

        $this->app->bind('App\Repositories\MaintenanceRepositoryInterface', function(){
            return new MaintenanceRepositoryEloquent(new Maintenance());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
