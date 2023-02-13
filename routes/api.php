<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\BlockController;
use App\Http\Controllers\Api\BookingController;

//rooms apis
Route::post('/rooms', [RoomController::class, 'create']);
Route::get('/daily-occupancy-rates/{date}', [RoomController::class, 'dailyOccupancy']);

//blocking apis
Route::post('/block', [BlockController::class, 'create']);

//booking apis
Route::post('/bookings', [BookingController::class, 'create']);
