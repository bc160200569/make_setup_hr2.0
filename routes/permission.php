<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {

    // Sub Navigation Routes
    Route::get('permission/{id}',[PermissionController::class, 'index'])->name('permission.index');
    Route::post('permission/datatable/{id}', [PermissionController::class, 'index'])->name('permission.datatable');
    Route::post('permission_store', [PermissionController::class, 'store'])->name('permission_store.store');
    Route::get('permission_edit/{id}', [PermissionController::class, 'edit'])->name('permission_edit');
    Route::post('permission_update', [PermissionController::class, 'update'])->name('permission_update');
    Route::get('permission/update-status/{permission}', [PermissionController::class, 'updateStatus'])->name('permission.updateStatus');
    Route::delete('permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');

});
