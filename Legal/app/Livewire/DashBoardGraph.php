<?php

namespace App\Livewire;

use App\Models\case_matrix;
use App\Models\document_record;
use Carbon\Carbon;
use Livewire\Component;

class DashBoardGraph extends Component
{
    public $doc_done_count;
    public $casegraph = [];

    public $docgraph = [];
    public function render()
    {
        $currentYear = Carbon::now()->year;
        for ($month = 1; $month <= 12; $month++) {
            $doc_done_count = document_record::whereYear('date_released', $currentYear)
                ->whereMonth('date_released', $month)
                ->where('status', 'Done')
                ->count();
    
            $docgraph[] = [
                'Month' => Carbon::createFromFormat('!m', $month)->format('M'),
                'Value' => $doc_done_count
            ];

            $case_resolved_count = case_matrix::whereYear('date_resolved',$currentYear)
            ->whereMonth('date_resolved', $month)
            ->where('status', 'Resolved')
            ->count();
            
            $casegraph[] = [
                'Month' => Carbon::createFromFormat('!m', $month)->format('M'),
                'Value' => $case_resolved_count
            ];
        }
        $this->docgraph = $docgraph;
        $this->casegraph = $casegraph;
        return view('livewire.dash-board-graph');
    }
}
