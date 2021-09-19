<?php

use App\Http\Controllers\API\apiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
    laravel resource controller 
    - you have to add (api) before any route like the example shown below.
    http://127.0.0.1:8000/api/ApiTest



 */
Route::resource('ApiTest', apiController::class);

Route::get('test', [apiController::class,'test']);