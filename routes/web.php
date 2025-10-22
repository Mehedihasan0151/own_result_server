<?php

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\Result2Controller;

Route::get('/', [ResultController::class, 'index'])->name('index');
Route::post('/upload', [ResultController::class, 'upload'])->name('upload.pdf');

Route::get('/search', function () {
    return view('search');
})->name('search');
Route::post('/search', [ResultController::class, 'search'])->name('search');

Route::get('/result/{roll}', function ($roll) {
    $result = Result::where('roll', $roll)->first();
    return view('result', compact('result'));
});