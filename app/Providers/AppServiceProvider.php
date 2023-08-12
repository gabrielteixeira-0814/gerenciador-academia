<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\User;
use App\Repositories\UserRepositoryEloquent;

use App\Model\Client_type;
use App\Repositories\Client_typeRepositoryEloquent;

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
