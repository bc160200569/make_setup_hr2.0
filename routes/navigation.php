<?php

use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {

    // Navigation Routes

    Route::get('navigation',[NavigationController::class, 'index'])->name('navigation.index');
    Route::post('navigation/datatable', [NavigationController::class, 'index'])->name('navigation.datatable');
    // Route::get('navigation_index', [NavigationController::class, 'navigation_index'])->name('navigation_index');
    // Route::post('navigation_index/datatable', [NavigationController::class, 'navigation_index'])->name('navigation_index.datatable');
    Route::post('navigation_store', [NavigationController::class, 'store'])->name('navigation_store');
    Route::get('navigation_edit/{id}', [NavigationController::class, 'edit'])->name('navigation_edit');
    Route::post('navigation_update', [NavigationController::class, 'update'])->name('navigation_update');
    Route::get('navigation/update-status/{navigation}', [NavigationController::class, 'updateStatus'])->name('navigation.updateStatus');
    Route::delete('navigation/{navigation}', [NavigationController::class, 'destroy'])->name('navigation.destroy');

});
