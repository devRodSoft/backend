<?php
use App\Http\Controllers\ApiController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

    Route::get('invoices', [ApiController::class, 'Invoices']);
    Route::get('cancel/{id}', [ApiController::class, 'Cancel']);
    Route::get('send/{id}', [ApiController::class, 'Send']);
    
    //SAt Calagos
    Route::get('docs', [ApiController::class, 'Documents']);
    Route::get('unidad', [ApiController::class, 'Unidad']);
    Route::get('cfdi', [ApiController::class, 'usoCFDI']);
    Route::get('mpago', [ApiController::class, 'mPago']);
    Route::get('moneda', [ApiController::class, 'Moneda']);
    Route::post('create', [ApiController::class, 'Create']);
    Route::get('client/{rfc}', [ApiController::class, 'Client']);



