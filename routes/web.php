<?php

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;

Route::get('/admin/upload', [ResultController::class, 'index'])->name('index');
Route::get('/admin/upload/3rd', [ResultController::class, 'index_3rd'])->name('3rd_sem');
Route::post('/upload', [ResultController::class, 'upload'])->name('upload');
Route::post('/upload/3rd', [ResultController::class, 'three_upload'])->name('three_upload');

Route::get('/', function () {
    return view('search');
})->name('home');
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