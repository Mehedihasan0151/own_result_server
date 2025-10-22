<?php

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\Result2Controller;

Route::get('/admin/upload', [ResultController::class, 'index'])->name('index');
Route::post('/upload', [ResultController::class, 'upload'])->name('upload.pdf');

Route::get('/', function () {
    return view('search');
})->name('search');
Route::get('/juthi', function () {
    return view('search_juthi');
})->name('search');
Route::post('/', [ResultController::class, 'search'])->name('search');

Route::post('/result/{roll}', function ($roll) {
    $result = Result::where('roll', $roll)->first();
    return view('result', compact('result'));
})->name('result.show');



Route::get('/juthi', function () {
    return view('search_juthi'); 
})->name('juthi.welcome');

// Page that FINDS and SHOWS Juthi's result
Route::get('/juthi/result', [ResultController::class, 'searchJuthiResult'])->name('juthi.result');