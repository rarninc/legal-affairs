<?php

namespace App\Livewire;

use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\On;
use Livewire\Component;

class GenerateReport extends Component
{
    public $docgraph;
    public $casegraph;
    public $cenopacgraph;
    
    #[On('get_data_report')]
    public function mount($docgraph = [], $casegraph = [], $cenopacgraph = []){
        $this->docgraph = $docgraph;
        $this->casegraph = $casegraph;
        $this->cenopacgraph = $cenopacgraph;
    }
    public function generate_report(){

        $labels = array_column($this->docgraph, 'Month');
        $doc_line_values = array_column($this->docgraph, 'Value');
        $case_line_values = array_column($this->casegraph, 'Value');
        $cenopac_line_values = array_column($this->cenopacgraph, 'Value');
        
        $labels_json = json_encode($labels);
        $doc_line_values_json = json_encode($doc_line_values);
        $case_line_values_json = json_encode($case_line_values);
        $cenopac_line_values_json = json_encode($cenopac_line_values);

        $doc_line_graph_config = '{
            "type": "line",
            "data": {
              "labels": '.$labels_json. ',
              "datasets": [{
                "label": "Document Processed",
                "data":' . $doc_line_values_json . '
              }]
            }
          }';
        
        $case_line_graph_config = '{
            "type": "line",
            "data": {
              "labels": '.$labels_json. ',
              "datasets": [{
                "label": "Cases",
                "data":' . $case_line_values_json . '
              }]
            }
          }';
        $cenopac_line_graph_config = '{
            "type": "line",
            "data": {
              "labels": '.$labels_json. ',
              "datasets": [{
                "label": "CeNoPac Generated",
                "data":' . $cenopac_line_values_json . '
              }]
            }
          }';
        $doc_graph_url1 = 'https://quickchart.io/chart?c=' . urlencode($doc_line_graph_config);
        $case_graph_url1 = 'https://quickchart.io/chart?c=' . urlencode($case_line_graph_config);
        $cenopac_graph_url1 = 'https://quickchart.io/chart?c=' . urlencode($cenopac_line_graph_config);
        $month_now = now()->format('M Y');

        $report = Pdf::loadView('pdf.generate_report', [
            'month_now' => $month_now,
            'url_1' => $case_graph_url1,
            'url_2' => $cenopac_graph_url1,
            'url_3' => $doc_graph_url1,
        ]);
        return response()->streamDownload(function () use ($report) {
            echo $report->stream();
            }, 'report.pdf');
    }

    public function render()
    {
        return view('livewire.generate-report');
    }
}
