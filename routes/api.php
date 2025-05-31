<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlaceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserPlaceController;

Route::get('/places', [PlaceController::class, 'index']);
Route::post('/places', [PlaceController::class, 'store']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

Route::post('/users/{id}/favorites', [UserController::class, 'addFavorite']);
Route::get('/users/{id}/favorites', [UserController::class, 'favorites']);
