<?php

use Illuminate\Support\Facades\Route;

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

Route::get('', function () {
    return redirect()->route('login');
});

Route::get('login', 'AuthController@index')->name('login');

Route::post('login', 'AuthController@authenticate');

Route::get('terms-conditions', 'TermsConditionsController@index');

Route::get('privacy-policy', 'PrivacyPolicyController@index');

Route::middleware(['auth'])->group(function ()
{
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::resource('dashboard', 'DashboardController')->only('index');

    Route::prefix('dashboard')->name('dashboard.')->group(function()
    {
        Route::resource('user', 'UserController');

        Route::resource('attendance', 'AttendanceController')->only('index', 'show', 'destroy');

        Route::resource('setting', 'SettingController')->only('index', 'store');
    });

    Route::prefix('laravel-filemanager')->group(function ()
    {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
