<?php

namespace App\Livewire;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashBoardGraph extends Component
{
    public $doc_done_count;
    public $casegraph = [];
    public $docgraph = [];
    public $cenopacgraph = [];
    public function render()
    {
        $currentYear = Carbon::now()->year;
        $case_count_all = DB::select("
                SELECT 
                    MONTH(date_resolved) AS month, 
                    COUNT(*) AS count 
                FROM 
                    case_matrix
                WHERE 
                    YEAR(date_resolved) = :year 
                    AND status = 'Resolved' 
                GROUP BY 
                    MONTH(date_resolved) 
                ORDER BY 
                    MONTH(date_resolved)
            ", ['year' => $currentYear]);

        $doc_count_all = DB::select("
                SELECT 
                    MONTH(date_released) AS month, 
                    COUNT(*) AS count 
                FROM 
                    legal_document_record 
                WHERE 
                    YEAR(date_released) = :year 
                    AND progress_status = 'Done' 
                GROUP BY 
                    MONTH(date_released) 
                ORDER BY 
                    MONTH(date_released)
            ", ['year' => $currentYear]);
        $cenopac_count_all = DB::select("                
                SELECT 
                    MONTH(date_issued) AS month, 
                    COUNT(*) AS count 
                FROM 
                    cenopac_record
                WHERE
                    YEAR(date_issued) =:year
                GROUP BY 
                    MONTH(date_issued) 
                ORDER BY 
                    MONTH(date_issued)
        ", ['year' => $currentYear]);
        $doc_count_all = collect($doc_count_all)->keyBy('month');
        $case_count_all = collect($case_count_all)->keyBy('month');
        $cenopac_count_all = collect($cenopac_count_all)->keyBy('month');

        for ($month = 1; $month <= 12; $month++) {
    
            $docgraph[] = [
                'Month' => Carbon::createFromFormat('!m', $month)->format('M'),
                'Value' => $doc_count_all->get($month)->count ?? 0
            ];
            
            $casegraph[] = [
                'Month' => Carbon::createFromFormat('!m', $month)->format('M'),
                'Value' => $case_count_all->get($month)->count ?? 0
            ];

            $cenopacgraph[] = [
                'Month' => Carbon::createFromFormat('!m', $month)->format('M'),
                'Value' => $cenopac_count_all->get($month)-> count ?? 0
            ];
        }
        $this->docgraph = $docgraph;
        $this->casegraph = $casegraph;
        $this->cenopacgraph = $cenopacgraph;
        $this->dispatch('get_data_report', $this->docgraph, $this->casegraph, $this->cenopacgraph);
        return view('livewire.dash-board-graph');
    }
}
