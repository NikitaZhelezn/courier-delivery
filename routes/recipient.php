<?php

use Illuminate\Support\Facades\Route;

/**
 * Sample of API that can be used for recipient resource.
 */
Route::group(['as' => 'recipient.', 'prefix' => 'recipient'], function () {
    //For further implementations
    /**
     * Get a list of existed recipients.
     */
    Route::get('recipients')
        ->name('recipients.list');

    /**
     * Get a description of recipient.
     */
    Route::get('recipient/{id}')
        ->name('recipient.show');

    /**
     * Create a new recipient.
     */
    Route::post('create-post-office')
        ->name('create-post-office');

    /**
     * Update existed recipient.
     */
    Route::post('update-post-office/{delivery_id}')
        ->name('update-post-office');
});
