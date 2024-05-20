<?php

namespace App\Livewire;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class GenerateReport extends Component
{
    public $doc_graph_year;
    public $case_graph_year;
    public $cenopac_graph_year;
    
    public $case_graph_month;
    public $cenopac_graph_month;
    public $doc_graph_month;
    
    public $counts = [];
    
    #[On('get_data_report')]
    public function mount($docgraph = [], $casegraph = [], $cenopacgraph = []){
        $this->doc_graph_year= $docgraph;
        $this->case_graph_year = $casegraph;
        $this->cenopac_graph_year = $cenopacgraph;
        
        $current_year = Carbon::now()->year;
        $current_month = Carbon::now()->month;

        $this->counts = [
            'case' => [
                'pending' => [ 'yearly' => 0, 'monthly' => 0, ],
                'resolved' => [ 'yearly' => 0, 'monthly' => 0, ],
                'total' => [ 'yearly' => 0, 'monthly' => 0, ],
            ],
            'cenopac' => [
                'request' => [ 'yearly' => 0, 'monthly' => 0, ],
                'denied' => [ 'yearly' => 0, 'monthly' => 0, ],
                'generated' => [ 'yearly' => 0, 'monthly' => 0, ],
            ],
            'doc' => [
                'to-do' => [ 'yearly' => 0, 'monthly' => 0, ],
                'doing' => [ 'yearly' => 0, 'monthly' => 0, ],
                'done' => [ 'yearly' => 0, 'monthly' => 0, ],
                'total' => [ 'yearly' => 0, 'monthly' => 0, ],
            ],
        ];

        // get count from case_matrix
        $this->counts['case']['pending']['yearly'] = DB::table('case_matrix')->where('status', 'Pending')->whereYear('date_issued', $current_year)->count();
        $this->counts['case']['resolved']['yearly'] = DB::table('case_matrix')->where('status', 'Resolved')->whereYear('date_resolved', $current_year)->count();
        $this->counts['case']['total']['yearly'] = DB::table('case_matrix')->whereYear('date_issued', $current_year)->count();

        $this->counts['case']['pending']['monthly'] = DB::table('case_matrix')->where('status', 'Pending')->whereMonth('date_issued', $current_month)->whereYear('date_issued', $current_year)->count();
        $this->counts['case']['resolved']['monthly'] = DB::table('case_matrix')->where('status', 'Resolved')->whereMonth('date_resolved', $current_month)->whereYear('date_resolved', $current_year)->count();
        $this->counts['case']['total']['monthly'] = DB::table('case_matrix')->whereMonth('date_issued', $current_month)->whereYear('date_issued', $current_year)->count();
        
        // get count from cenopac record
        $this->counts['cenopac']['request']['yearly'] = DB::table('cenopac_request')->where('status', 'Pending')->whereYear('date_requested', $current_year)->count();
        $this->counts['cenopac']['denied']['yearly'] = DB::table('cenopac_request')->where('status', 'Denied')->whereYear('date_requested', $current_year)->count();
        $this->counts['cenopac']['generated']['yearly'] = DB::table('cenopac_record')->whereYear('date_issued', $current_year)->count();
        
        $this->counts['cenopac']['request']['monthly'] = DB::table('cenopac_request')->where('status', 'Pending')->whereMonth('date_requested', $current_month)->whereYear('date_requested', $current_year)->count();
        $this->counts['cenopac']['denied']['monthly'] = DB::table('cenopac_request')->where('status', 'Denied')->whereMonth('date_requested', $current_month)->whereYear('date_requested', $current_year)->count();
        $this->counts['cenopac']['generated']['monthly'] = DB::table('cenopac_record')->whereMonth('date_issued', $current_month)->whereYear('date_issued', $current_year)->count();
        
        // get count from document record
        $this->counts['doc']['to-do']['yearly'] = DB::table('document_record')->where('progress_status', 'To-Do')->whereYear('date_received', $current_year)->count();
        $this->counts['doc']['doing']['yearly'] = DB::table('document_record')->where('progress_status', 'Doing')->whereYear('date_received', $current_year)->count();
        $this->counts['doc']['done']['yearly'] = DB::table('document_record')->where('progress_status', 'Done')->whereYear('date_received', $current_year)->count();
        $this->counts['doc']['total']['yearly'] = DB::table('document_record')->whereYear('date_received', $current_year)->count();
        
        $this->counts['doc']['to-od']['monthly'] = DB::table('document_record')->where('progress_status', 'To-Do')->whereMonth('date_released', $current_month)->whereYear('date_received', $current_year)->count();
        $this->counts['doc']['doing']['monthly'] = DB::table('document_record')->where('progress_status', 'Doing')->whereMonth('date_received', $current_month)->whereYear('date_received', $current_year)->count();
        $this->counts['doc']['done']['monthly'] = DB::table('document_record')->where('progress_status', 'Done')->whereMonth('date_released', $current_month)->whereYear('date_released', $current_year)->count();
        $this->counts['doc']['total']['monthly'] = DB::table('document_record')->whereMonth('date_received', $current_month)->whereYear('date_received', $current_year)->count();
        
        $case_month_count = DB::select("
                SELECT 
                    CONCAT('WEEK ', WEEK(date_resolved) - WEEK(DATE_SUB(date_resolved, INTERVAL DAYOFMONTH(date_resolved) - 1 DAY)) + 1) AS week_number,
                    COUNT(*) AS record_count
                FROM 
                    case_matrix
                WHERE 
                    status = 'Resolved' AND 
                    MONTH(date_resolved) = :month AND
                    YEAR(date_resolved) = :year
                GROUP BY 
                    week_number
                ORDER BY 
                    week_number;
            ", ['year' => $current_year, 'month' => $current_month]);
            
        $cenopac_month_count = DB::select("
                SELECT 
                    CONCAT('WEEK ', WEEK(date_issued) - WEEK(DATE_SUB(date_issued, INTERVAL DAYOFMONTH(date_issued) - 1 DAY)) + 1) AS week_number,
                    COUNT(*) AS record_count
                FROM 
                    cenopac_record
                WHERE  
                    MONTH(date_issued) = :month AND
                    YEAR(date_issued) = :year
                GROUP BY 
                    week_number
                ORDER BY 
                    week_number;
            ", ['year' => $current_year, 'month' => $current_month]);
        $doc_month_count = DB::select("
                SELECT 
                    CONCAT('WEEK ', WEEK(date_released) - WEEK(DATE_SUB(date_released, INTERVAL DAYOFMONTH(date_released) - 1 DAY)) + 1) AS week_number,
                    COUNT(*) AS record_count
                FROM 
                    document_record
                WHERE 
                    progress_status = 'Done' AND 
                    MONTH(date_released) = :month AND
                    YEAR(date_released) = :year
                GROUP BY 
                    week_number
                ORDER BY 
                    week_number;
        ", ['year' => $current_year, 'month' => $current_month]);

        $case_month_count = collect($case_month_count)->keyBy('week_number');
        $cenopac_month_count = collect($cenopac_month_count)->keyBy('week_number');
        $doc_month_count = collect($doc_month_count)->keyBy('week_number');
        for ($week = 1; $week <= 4; $week++) {

            $case_graph_month[] = [
                'Week' => 'Week '. $week,
                'Value' => $case_month_count->get('WEEK '.$week)->record_count ?? 0
            ];

            $cenopac_graph_month[] = [
                'Week' => 'Week '. $week,
                'Value' => $cenopac_month_count->get('WEEK '.$week)->record_count ?? 0
            ];
            
            $doc_graph_month[] = [
                'Week' => 'Week '. $week,
                'Value' => $doc_month_count->get('WEEK '.$week)->record_count ?? 0
            ];
        }
        $this->case_graph_month = $case_graph_month;
        $this->cenopac_graph_month = $cenopac_graph_month;
        $this->doc_graph_month = $doc_graph_month;
    }
    public function generate_report(){

        $month_labels = json_encode(array_column($this->case_graph_year, 'Month'));
        $week_labels = json_encode(array_column($this->case_graph_month, 'Week'));

        // current year values
        $doc_year_values = json_encode(array_column($this->doc_graph_year, 'Value'));
        $case_year_values = json_encode(array_column($this->case_graph_year, 'Value'));
        $cenopac_year_values = json_encode(array_column($this->cenopac_graph_year, 'Value'));

        // current month values
        $case_month_values = json_encode(array_column($this->case_graph_month, 'Value'));
        $cenopac_month_values = json_encode(array_column($this->cenopac_graph_month, 'Value'));
        $doc_month_values = json_encode(array_column($this->doc_graph_month, 'Value'));

        $month_now = now()->format('M Y');
        
        $case_year_graph_config = '{
            "type": "line",
            "data": {
              "labels": '.$month_labels. ',
              "datasets": [{
                "label": "Cases Resolved",
                "data":' . $case_year_values . '
              }]
            }
          }';
        
        $cenopac_year_graph_config = '{
            "type": "line",
            "data": {
            "labels": '.$month_labels. ',
            "datasets": [{
                "label": "Generated CeNoPac",
                "data":' . $cenopac_year_values . '
            }]
            }
        }';
    
        $doc_year_graph_config = '{
            "type": "line",
            "data": {
              "labels": '.$month_labels. ',
              "datasets": [{
                "label": "Document Processed",
                "data":' . $doc_year_values . '
              }]
            }
          }';

        $case_month_graph_config = '{
            "type": "line",
            "data": {
              "labels": '.$week_labels. ',
              "datasets": [{
                "label": "Cases Resolved | '.$month_now. '",
                "data":' . $case_month_values . '
              }]
            }
          }';

        $cenopac_month_graph_config = '{
            "type": "line",
            "data": {
              "labels": '.$week_labels. ',
              "datasets": [{
                "label": "Generated CeNoPac | ' .$month_now.  '",
                "data":' . $cenopac_month_values . '
              }]
            }
          }';

        $doc_month_graph_config = '{
            "type": "line",
            "data": {
              "labels": '.$week_labels. ',
              "datasets": [{
                "label": "Processed Documents | '.$month_now.'",
                "data":' . $doc_month_values . '
              }]
            }
          }';

        $doc_year_graph_url = 'https://quickchart.io/chart?c=' . urlencode($doc_year_graph_config);
        $case_year_graph_url = 'https://quickchart.io/chart?c=' . urlencode($case_year_graph_config);
        $cenopac_year_graph_url = 'https://quickchart.io/chart?c=' . urlencode($cenopac_year_graph_config);
            
        $case_month_graph_url = 'https://quickchart.io/chart?c=' . urlencode($case_month_graph_config);
        $cenopac_month_graph_url = 'https://quickchart.io/chart?c=' . urlencode($cenopac_month_graph_config);
        $doc_month_graph_url = 'https://quickchart.io/chart?c=' . urlencode($doc_month_graph_config);
        
        $report = Pdf::loadView('pdf.generate_report', [
            'month_now' => $month_now,
            'case_graph_url_1' => $case_year_graph_url,
            'case_graph_url_2' => $case_month_graph_url,
            'cenopac_graph_url_1' => $cenopac_year_graph_url,
            'cenopac_graph_url_2' => $cenopac_month_graph_url,
            'doc_graph_url_1' => $doc_year_graph_url,
            'doc_graph_url_2' => $doc_month_graph_url,
            'counts' => $this->counts,
        ]);
        return response()->streamDownload(function () use ($report) {
            echo $report->stream();
            }, $month_now.'-OULC-Report.pdf');
    }

    public function render()
    {
        return view('livewire.generate-report');
    }
}
