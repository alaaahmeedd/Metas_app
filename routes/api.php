<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Models\Product;
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

// public routes

Route::post('/register', [AuthController::class , 'register']);
Route::post('/login', [AuthController::class , 'login']);
Route::get('/products', [ProductController::class , 'index']);
Route::get('/products/{id}', [ProductController::class , 'show']);
Route::get('/products/search/{name}', [ProductController::class , 'search']);
Route::post('/products', [ProductController::class , 'store']);
// Route::post('/products/search/{ticketname}', [ProductController::class , 'searchTicket']);

// protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    // Route::post('/products', [ProductController::class , 'store']);
    Route::post('/logout', [AuthController::class , 'logout']);
    Route::put('/products/{id}', [ProductController::class , 'update']);
    
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });