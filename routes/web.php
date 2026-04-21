<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/item', function () {
    return view('item.index', ['title' => 'Item']);
});


Route::get('/item/create', function () {
    return view('item.create', ['title' => 'Create Item']);
});
