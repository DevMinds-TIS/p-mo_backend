<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;


Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/upload-file', [FileUploadController::class, 'create']);
Route::post('/upload-file', [FileUploadController::class, 'store']);

require __DIR__.'/auth.php';
