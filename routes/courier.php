<?php

use App\Http\Controllers\Api\Delivery\DeliveryController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'couriers.', 'prefix' => 'couriers'], function () {
    Route::post('create-delivery', [DeliveryController::class, 'store']);

    //For further implementations
    /**
     * Get a list of existed deliveries for user
     */
    Route::get('deliveries')
        ->name('user.deliveries');

    /**
     * Get a full description of the delivery
     */
    Route::get('delivery/{id}')
        ->name('user.delivery');

    /**
     * Update existed delivery
     */
    Route::post('update-delivery/{delivery_id}')
        ->name('user.update-delivery');
});
