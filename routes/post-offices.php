<?php

use Illuminate\Support\Facades\Route;

/**
 * Resource of the post offices. It would be used as further logic for the adding new post offices.
 */
Route::group(['as' => 'post-office.', 'prefix' => 'post-office'], function () {
    //For further implementations
    /**
     * Get a list of existed post offices
     */
    Route::get('post-offices')
        ->name('post-office.list');

    /**
     * Get a full description of the existed post office
     */
    Route::get('post-office/{id}')
        ->name('post-office.show');

    /**
     * Get a full description of the delivery
     */
    Route::post('create-post-office')
        ->name('create-post-office');

    /**
     * Update existed post office
     */
    Route::post('update-post-office/{delivery_id}')
        ->name('update-post-office');

    /**
     * Delete existed post office
     */
    Route::delete('delete-post-office/{delivery_id}')
        ->name('delete-post-office');
});
