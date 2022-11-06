<?php

use Inertia\Inertia;
use App\Models\Startup;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Request;
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
    return (Inertia::render('Welcome', [
        'startups' => Startup::filter(Request::only('search'))->paginate(10)
    ]));
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
Route::get('startups/search',[StartupController::class,'searchGet'])->name('startups.search.get');
Route::post('startups/search',[StartupController::class,'search'])->name('startups.search');
require __DIR__.'/auth.php';


