<?php

namespace App\Livewire;

use App\Models\case_matrix;
use App\Models\cenopac_record;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class CenopacCertificate extends Component
{
    public $employee_name;
    public $originating_office;
    public $position;
    public $purpose;
    public $date_requested;
    public $date_issued;
    public $reject = false;
    
    public function render()
    {
        return view('livewire.cenopac-certificate');
    }
    public function mount()
    {
        $this->employee_name = request()->query('employee_name');
        $this->originating_office = request()->query('originating_office');
        $this->position = request()->query('position');
        $this->purpose = request()->query('purpose');
        $this->date_requested = request()->query('date_requested');
        $this->date_issued = now()->toDateString();
    }

    public function create(){
        $this->validate();
        $case_matrix=case_matrix::where('employee_name',$this->employee_name)->get();
        foreach($case_matrix as $cm){
            if($cm->status === "On-going"){
                $this->reject = true;
            }
        }
        if($this->reject){
            session()->flash('failed', $this->employee_name .' has a record of on-going case/s');
            // $this->reset();
            return redirect()->back();  
        }
        cenopac_record::create([
            'employee_name' => $this->employee_name,
            'originating_office'=> $this->originating_office,
            'position' => $this->position,
            'purpose' => $this->purpose,
            'date_requested' => $this->date_requested,
            'date_issued' => $this->date_issued,
        ]);
        session()->flash('success','CeNoPac for '. $this->employee_name .  ' generated successfully');
        
        $this->date_issued = strtotime($this->date_issued);
        $this->date_issued = date('F d, Y', $this->date_issued);
        
        $cenopac = Pdf::loadView('pdf.generate_cenopac_cert', [
            'employee_name' => $this->employee_name,
            'originating_office' => $this->originating_office,
            'position' => $this->position,
            'date_issued' => $this->date_issued,
        ]);

        $this->reset();
        return response()->streamDownload(function () use ($cenopac) {
            echo $cenopac->stream();
            }, 'cenopac_cert.pdf');

    }

    public function go_to_case_matrix(){
        $this->redirectRoute('case_matrix',[
            'employee_name' => $this->employee_name,
        ]);
    }

    public function rules(){
        return [
            'employee_name' => 'required|max:50',
            'originating_office'=> 'required|max:100',
            'position' => 'required|max:100',
            'purpose' => 'required|max:100',
            'date_requested' => 'required',
            'date_issued' => 'required',
        ];        
    }
}
