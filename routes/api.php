<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\VisaDocumentController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/flights', [FlightController::class, 'index']);
Route::get('/flights/{id}', [FlightController::class, 'show']);

Route::get('/hotels', [HotelController::class, 'index']);
Route::get('/hotels/{id}', [HotelController::class, 'show']);

Route::get('/tours', [TourController::class, 'index']);
Route::get('/tours/{id}', [TourController::class, 'show']);

Route::get('/search', [SearchController::class, 'search']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/v1/flights/search', [TravelController::class, 'searchFlights']);
    Route::get('/v1/hotels/search', [TravelController::class, 'searchHotels']);
    Route::get('/v1/visa/check', [TravelController::class, 'checkVisa']);
    Route::get('/v1/insurance/quote', [TravelController::class, 'getInsurance']);

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
});
