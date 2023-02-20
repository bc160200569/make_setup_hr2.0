<?php

use App\Http\Controllers\SubNavigationController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {

    // Sub Navigation Routes
    Route::get('sub_navigation/{id}',[SubNavigationController::class, 'index'])->name('sub_navigation.index');
    Route::post('sub_navigation/datatable/{id}', [SubNavigationController::class, 'index'])->name('sub_navigation.datatable');
    Route::post('sub_navigation_store', [SubNavigationController::class, 'store'])->name('sub_navigation.store');
    Route::get('sub_navigation_edit/{id}', [SubNavigationController::class, 'edit'])->name('sub_navigation_edit');
    Route::post('sub_navigation_update', [SubNavigationController::class, 'update'])->name('sub_navigation_update');
    Route::get('sub_navigation/update-status/{subnavigation}', [SubNavigationController::class, 'updateStatus'])->name('sub_navigation.updateStatus');
    Route::delete('sub_navigation/{subnavigation}', [SubNavigationController::class, 'destroy'])->name('sub_navigation.destroy');

});
