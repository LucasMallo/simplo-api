<?php

namespace App\Containers\Customer\UI\API\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Containers\Customer\UI\API\Controllers\CustomerController;


Route::group([
    'prefix' => 'customer/',
], function () {
    Route::get(
        '',
        [
            'as' => 'api_customer_list',
            'uses' => CustomerController::class . '@list',
        ]
    );
    Route::post(
        '',
        [
            'as' => 'api_customer_store',
            'uses' => CustomerController::class . '@store',
        ]
    );
    Route::patch(
        '{customer_id}',
        [
            'as' => 'api_customer_update',
            'uses' => CustomerController::class . '@update',
        ]
    );
    Route::get(
        '/all/{customer_id}',
        [
            'as' => 'api_customer_show_all',
            'uses' => CustomerController::class . '@showAll',
        ]
    );
    Route::get(
        '{customer_id}',
        [
            'as' => 'api_customer_show',
            'uses' => CustomerController::class . '@show',
        ]
    );
    Route::delete(
        '{customer_id}',
        [
            'as' => 'api_customer_delete',
            'uses' => CustomerController::class . '@delete',
        ]
    );
});

