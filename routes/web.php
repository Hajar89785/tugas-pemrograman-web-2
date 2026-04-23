<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/item', [ItemController::class, 'index']);
Route::get('/item/create', [ItemController::class, 'create']);

