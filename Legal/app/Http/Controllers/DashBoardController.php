<?php

namespace App\Http\Controllers;

use App\Models\case_matrix;
use App\Models\cenopac_request;
use App\Models\document_record;
use Carbon\Carbon;

class DashBoardController extends Controller
{
    public function index(){
        $month_and_year = Carbon::now()->format('F Y');
        $case_resolved_count = case_matrix::where('status','On-going')
            ->count();
        $doc_done_count = document_record::where('progress_status','To-Do')
            ->orwhere('progress_status', 'In-Progress')
            ->count();
        $cenopac_generated_count = cenopac_request::where('status','Pending')
            ->count();
        
        return view('dashboard', compact('case_resolved_count', 'doc_done_count', 'cenopac_generated_count', 'month_and_year'));
    }
}
