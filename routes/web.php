<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\StartupController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('startups',StartupController::class);
Route::resource('donations',DonationController::class);
require __DIR__.'/auth.php';



Route::group(['namespace' => 'App\Http\Controllers'], function()
{   

    /**
    * startup Routes
    */
    // Route::resource('startups', StartupController::class);
    // Route::group(['prefix' => 'startups'], function() {
    //         Route::get('/', 'StartupController@index')->name('startups.index');
    //         Route::get('/create', 'StartupController@create')->name('startups.create');
    //         Route::post('/create', 'StartupController@store')->name('startups.store');
    //         Route::get('/{startup}/show', 'StartupController@show')->name('startups.show');
    //         Route::get('/{startup}/edit', 'StartupController@edit')->name('startups.edit');
    //         Route::patch('/{startup}/update', 'StartupController@update')->name('startups.update');
    //         Route::delete('/{startup}/delete', 'StartupController@destroy')->name('startups.destroy');
    // });
});