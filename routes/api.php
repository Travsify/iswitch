<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\VisaDocumentController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::post('/v1/leads', [LeadController::class, 'store']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/v1/flights/search', [\App\Http\Controllers\TravelController::class, 'searchFlights']);
Route::get('/v1/hotels/search', [\App\Http\Controllers\TravelController::class, 'searchHotels']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/v1/visa/check', [\App\Http\Controllers\TravelController::class, 'checkVisa']);
    Route::get('/v1/insurance/quote', [\App\Http\Controllers\TravelController::class, 'getInsurance']);
    Route::get('/v1/tours/search', [\App\Http\Controllers\TravelController::class, 'searchTours']);
    Route::get('/v1/logistics/quote', [\App\Http\Controllers\TravelController::class, 'getTransfers']);

    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Visa Vault
    Route::get('/vault', [VisaDocumentController::class, 'index']);
    Route::post('/vault', [VisaDocumentController::class, 'store']);
    Route::get('/vault/{id}', [VisaDocumentController::class, 'show']);
    Route::delete('/vault/{id}', [VisaDocumentController::class, 'destroy']);

    // Wallets
    Route::get('/wallets', [\App\Http\Controllers\WalletController::class, 'index']);
    Route::get('/wallets/history', [\App\Http\Controllers\WalletController::class, 'history']);
    Route::post('/wallets/fund', [\App\Http\Controllers\WalletController::class, 'fund']);
    Route::post('/wallets/swap', [\App\Http\Controllers\WalletController::class, 'swap']);
    Route::post('/wallets/send', [\App\Http\Controllers\WalletController::class, 'send']);
    Route::post('/wallets/withdraw', [\App\Http\Controllers\WalletController::class, 'withdraw']);

    // Bookings
    Route::post('/flights/{id}/book', [FlightController::class, 'book']);
    Route::post('/hotels/{id}/book', [HotelController::class, 'book']);
    Route::post('/tours/{id}/book', [TourController::class, 'book']);

    // Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);

    // Ancillary Services
    Route::get('/ancillary-services', [\App\Http\Controllers\AncillaryServiceController::class, 'index']);
    Route::post('/ancillary-services/{id}/book', [\App\Http\Controllers\AncillaryServiceController::class, 'book']);

    // iSwitch "God Mode" (Super Admin)
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        Route::get('/agents', [AdminController::class, 'listAgents']);
        Route::post('/agents/{id}/approve', [AdminController::class, 'approveAgent']);
        Route::post('/agents/{id}/suspend', [AdminController::class, 'suspendAgent']);
        Route::get('/users', [AdminController::class, 'listUsers']);
    });
});
