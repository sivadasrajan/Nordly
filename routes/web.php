<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ApplicationController;

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
Route::resource('applications',ApplicationController::class);
Route::resource('startups',StartupController::class);
Route::post('applications/{id}/approve',[ApplicationController::class,'approve'])->name('applications.approve');
Route::post('applications/{id}/reject',[ApplicationController::class,'reject'])->name('applications.reject');
Route::resource('donations',DonationController::class);
Route::get('donations/donate/{id}',[DonationController::class,'donateGet'])->name('donate');
Route::post('donations/donate',[DonationController::class,'donate'])->name('donate.save');
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