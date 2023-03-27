<?php

namespace App\Containers\Customer\Providers;

use Illuminate\Support\ServiceProvider;
use App\Containers\Customer\Actions\GetCustomerListAction;
use App\Containers\Customer\Actions\Interfaces\GetCustomerActionInterface;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(GetCustomerActionInterface::class, GetCustomerListAction::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
