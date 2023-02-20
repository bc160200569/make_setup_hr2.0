<?php

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubNavigationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::post('users/datatable', [UserController::class, 'index'])->name('users.datatable');
    Route::get('users/update-status/{user}', [UserController::class, 'updateStatus'])->name('users.updateStatus');

    Route::resource('roles', RoleController::class);    
    Route::post('roles/datatable', [RoleController::class, 'index'])->name('roles.datatable');
    Route::get('roles/update-status/{role}', [RoleController::class, 'updateStatus'])->name('roles.updateStatus');
    Route::get('roles/permissions/{role}', [RoleController::class, 'getRolePermissions'])->name('roles.getPermissions'); //->middleware(['role_or_permission:Super Admin|Role Permissions']);
    Route::put('roles/permissions/{role}', [RoleController::class, 'updateRolePermission'])->name('roles.permissions'); //->middleware(['role_or_permission:Super Admin|Role Permissions']);
    
    Route::resource('permissions', PermissionController::class);
    Route::post('permissions/datatable', [PermissionController::class, 'index'])->name('permissions.datatable');

    // // Navigation Routes

    // Route::get('navigation',[NavigationController::class, 'index'])->name('navigation.index');
    // Route::post('navigation/datatable', [NavigationController::class, 'index'])->name('navigation.datatable');
    // // Route::get('navigation_index', [NavigationController::class, 'navigation_index'])->name('navigation_index');
    // // Route::post('navigation_index/datatable', [NavigationController::class, 'navigation_index'])->name('navigation_index.datatable');
    // Route::post('navigation_store', [NavigationController::class, 'store'])->name('navigation_store');
    // Route::get('navigation_edit/{id}', [NavigationController::class, 'edit'])->name('navigation_edit');
    // Route::post('navigation_update', [NavigationController::class, 'update'])->name('navigation_update');
    // Route::get('navigation/update-status/{navigation}', [NavigationController::class, 'updateStatus'])->name('navigation.updateStatus');
    // Route::delete('navigation/{navigation}', [NavigationController::class, 'destroy'])->name('navigation.destroy');

    // // Sub Navigation Routes
    // Route::get('sub_navigation/{id}',[SubNavigationController::class, 'index'])->name('sub_navigation.index');
    // Route::post('sub_navigation/datatable/{id}', [SubNavigationController::class, 'index'])->name('sub_navigation.datatable');
    // Route::post('sub_navigation_store', [SubNavigationController::class, 'store'])->name('sub_navigation.store');
    // Route::get('sub_navigation_edit/{id}', [SubNavigationController::class, 'edit'])->name('sub_navigation_edit');
    // Route::post('sub_navigation_update', [SubNavigationController::class, 'update'])->name('sub_navigation_update');
    // Route::get('sub_navigation/update-status/{subnavigation}', [SubNavigationController::class, 'updateStatus'])->name('sub_navigation.updateStatus');
    // Route::delete('sub_navigation/{subnavigation}', [SubNavigationController::class, 'destroy'])->name('sub_navigation.destroy');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/navigation.php';
require __DIR__.'/sub_navigation.php';
