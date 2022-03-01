<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PersonController;
use App\Models\Product;
use App\Models\Person;
use App\Models\Ticket;

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

// Route::resource('products', ProductController::class);

// Public Routes Authantication

Route::post('/register', [AuthController::class , 'register']);
Route::post('/login', [AuthController::class , 'login']);
Route::get('/login', [AuthController::class , 'login']);
Route::post('/logout', [AuthController::class , 'logout']);

// Public Route Tickets

Route::get('/tickets', [TicketController::class , 'index']);
Route::get('/tickets/{id}', [TicketController::class , 'show']);
Route::post('/tickets', [TicketController::class , 'store']);
Route::put('/tickets/{id}', [TicketController::class , 'update']);
Route::get('/tickets/search/{name}', [TicketController::class , 'search']);
Route::delete('/tickets/{id}', [TicketController::class, 'destroy']);


// Public Route person

Route::get('/person', [PersonController::class , 'index']);
Route::get('/person/{id}', [PersonController::class , 'show']);
Route::post('/person', [PersonController::class , 'store']);
Route::put('/person/{id}', [PersonController::class , 'update']);
Route::get('/person/search/{name}', [PersonController::class , 'search']);
Route::delete('/person/{id}', [PersonController::class, 'destroy']);


// Public Route Products

Route::get('/products', [ProductController::class , 'index']);
Route::get('/products/{id}', [ProductController::class , 'show']);
Route::get('/products/search/{name}', [ProductController::class , 'search']);

// protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/products', [ProductController::class , 'store']);
    Route::post('/logout', [AuthController::class , 'logout']);
    Route::put('/products/{id}', [ProductController::class , 'update']);
    
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
