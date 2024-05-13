<?php

namespace App\Http\Controllers;

use App\Models\case_matrix;
use App\Models\cenopac_record;
use App\Models\document_record;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){

        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $month_and_year = Carbon::now()->format('F Y');
        $case_resolved_count = case_matrix::whereYear('date_resolved',$currentYear)
            ->whereMonth('date_resolved', $currentMonth)
            ->where('status', 'Resolved')
            ->count();
        // not sure if date_released parameter for date of finished documents
        $doc_done_count = document_record::whereYear('date_released',$currentYear)
            ->whereMonth('date_released', $currentMonth)
            ->where('status', 'Done')
            ->count();
        $cenopac_generated_count = cenopac_record::whereYear('date_issued',$currentYear)
            ->whereMonth('date_issued', $currentMonth)
            ->count();
        return view('dashboard', compact('case_resolved_count', 'doc_done_count', 'cenopac_generated_count', 'month_and_year'));
    }
}
