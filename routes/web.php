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
Route::post('/', [ResultController::class, 'search'])->name('search');

// only for juthi
Route::get('/juthi', function () {
    return view('search_juthi'); 
})->name('juthi.welcome');
Route::get('/juthi/result', [ResultController::class, 'searchJuthiResult'])->name('juthi.result');

// result show page
Route::post('/result/{roll}', function ($roll) {
    $result = Result::where('roll', $roll)->first();
    return view('result', compact('result'));
})->name('result.show');