<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
