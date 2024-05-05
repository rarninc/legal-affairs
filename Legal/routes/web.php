<?php

use App\Http\Controllers\CaseMatrixController;
use App\Http\Controllers\CenopacController;
use App\Http\Controllers\CenopacRecordController;
use App\Http\Controllers\CenopacRequestController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\DocumentRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/case_matrix', [CaseMatrixController::class , 'index'])->name('case_matrix');
Route::get('/cenopac', [CenopacController::class , 'index'])->name('cenopac');
Route::get('/cenopac_record', [CenopacRecordController::class , 'index']);
Route::get('/cenopac_request', [CenopacRequestController::class , 'index']);
Route::get('/document_record', [DocumentRecordController::class , 'index']);
Route::get('/dashboard', [DashBoardController::class , 'index']);

Route::get('/', function () {
    return view('login');
});

Route::get('/document_board', function () {
    return view('document_board');
});

Route::get('/about', function () {
    return view('about');
});