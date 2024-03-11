<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/events', 'EventController@getEventsBetweenDates');
// Route::get('/flights/next-week', 'EventController@getFlightsForNextWeek');
// Route::get('/standby/next-week', 'EventController@getStandbyEventsForNextWeek');
// Route::get('/flights/from/{location}', 'EventController@getFlightsFromLocation');
Route::get('/events', [EventController::class,'getEventsBetweenDates']);
Route::get('/flights/next-week', [EventController::class,'getFlightsForNextWeek']);
Route::get('/standby/next-week', [EventController::class, 'getStandbyEventsForNextWeek']);
Route::get('/flights/from/{location}', [EventController::class,'@getFlightsFromLocation']);

