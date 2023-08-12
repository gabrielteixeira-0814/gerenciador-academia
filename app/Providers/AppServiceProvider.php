<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\User;
use App\Repositories\UserRepositoryEloquent;

use App\Model\Client_type;
use App\Repositories\Client_typeRepositoryEloquent;

use App\Model\Client;
use App\Repositories\ClientRepositoryEloquent;

use App\Model\Maintenance;
use App\Repositories\MaintenanceRepositoryEloquent;

use App\Model\Gadgets;
use App\Repositories\GadgetsRepositoryEloquent;

use App\Model\Employee;
use App\Repositories\EmployeeRepositoryEloquent;

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

        // Client
        $this->app->bind('App\Repositories\ClientRepositoryInterface', 'App\Repositories\ClientRepositoryEloquent');

        $this->app->bind('App\Repositories\ClientRepositoryInterface', function(){
            return new ClientRepositoryEloquent(new Client());
        });

        // Maintenance
        $this->app->bind('App\Repositories\MaintenanceRepositoryInterface', 'App\Repositories\MaintenanceRepositoryEloquent');

        $this->app->bind('App\Repositories\MaintenanceRepositoryInterface', function(){
            return new MaintenanceRepositoryEloquent(new Maintenance());
        });

        // Gadgets
        $this->app->bind('App\Repositories\GadgetsRepositoryInterface', 'App\Repositories\GadgetsRepositoryEloquent');

        $this->app->bind('App\Repositories\GadgetsRepositoryInterface', function(){
            return new GadgetsRepositoryEloquent(new Gadgets());
        });

        // Employee
        $this->app->bind('App\Repositories\EmployeeRepositoryInterface', 'App\Repositories\EmployeeRepositoryEloquent');

        $this->app->bind('App\Repositories\EmployeeRepositoryInterface', function(){
            return new EmployeeRepositoryEloquent(new Employee());
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
