<?php

use App\Http\Controllers\CaseMatrixController;
use App\Http\Controllers\CenopacController;
use App\Http\Controllers\CenopacRecordController;
use App\Http\Controllers\CenopacRequestController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\DocumentRecordController;
use App\Http\Controllers\VerifyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/case_matrix', [CaseMatrixController::class , 'index'])->name('case_matrix');
Route::get('/cenopac', [CenopacController::class , 'index'])->name('cenopac');
Route::get('/cenopac_record', [CenopacRecordController::class , 'index']);
Route::get('/cenopac_request', [CenopacRequestController::class , 'index']);
Route::get('/document_record', [DocumentRecordController::class , 'index']);
Route::get('/dashboard', [DashBoardController::class , 'index']);
Route::get('/authorize', [VerifyController::class , 'index']);
Route::post('/dashboard/generate_report', [DashBoardController::class , 'generate_report'])->name('dashboard.generate');

Route::get('/document_view', function () {
  	// $id = Session::get('user_id');
    $id = '202410046';
  	if($id == '202410046'){
    	return view('document_view');
    }
    return redirect('/access-denied'); 
});

Route::get('/about', function () {
  	// $id = Session::get('user_id');
    $id = '202410046';
      	if($id == '202410046'){
      		return view('about');
        }
        return redirect('/access-denied'); 
});

Route::get('/access-denied', function () {      	
    		return view('access-denied');
});