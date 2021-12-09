<?php

use App\Attendance;
use App\Http\Controllers\ApiAttendanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('api')->group( function ()
{

    Route::prefix('auth')->group(function ()
    {
        Route::post('login', 'ApiAuthController@login');

        Route::post('login-alternative', 'ApiAuthController@loginAlternative');
    });

    Route::middleware('jwt.auth')->group(function ()
    {
        Route::prefix('auth')->group(function ()
        {
            Route::post('logout', 'ApiAuthController@logout');

            Route::post('refresh', 'ApiAuthController@refresh');

            Route::post('me', 'ApiAuthController@me');
        });

        Route::get('attendance', 'ApiAttendanceController@index');

        Route::prefix('attendance')->group(function () {
            Route::post('check-in', 'ApiAttendanceController@checkIn');

            Route::post('check-out', 'ApiAttendanceController@checkOut');
        });

        Route::get('activity', 'ApiActivityController@index');

        Route::get('user', 'ApiUserController@index');

        Route::prefix('user')->group(function()
        {
            Route::post('update-profile', 'ApiUserController@updateProfil');

            Route::post('update-password', 'ApiUserController@updatePassword');
        });
    });

    Route::resource('setting', 'ApiSettingController')->only('index');
});

