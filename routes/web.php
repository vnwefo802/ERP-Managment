<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;


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
    return view('welcome');
});
Route::get('/company', [CompanyController::class, 'index']);

Route::controller(CompanyController::class)->group(function(){
    // Route::get('/company', 'index');
    Route::get('/company/create', 'create');
    Route::get('/company/create', 'store');
    Route::get('/company/{id}', 'show');
    Route::get('/company/edit/{id}', 'edit');
    Route::get('/company/{id}', 'update');
    Route::get('/company', 'store');

});

// Route::resource('/company', CompanyController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
