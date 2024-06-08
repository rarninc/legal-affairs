<?php

namespace App\Livewire;

use App\Models\case_matrix;
use App\Models\cenopac_record;
use App\Models\cenopac_request;
use App\Models\employees;
use App\Models\pending_task;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class CenopacCertificate extends Component
{
    public $employee_name;
    public $originating_office="";
    public $position;
    public $purpose;
    public $date_requested;
    public $date_issued;
    public $reject = false;
    public $id;
    public $legal_counsel = '';
    
    public function render()
    {
        return view('livewire.cenopac-certificate');
    }
    public function mount()
    {
        $this->id = request()->query('id');
        $this->employee_name = request()->query('employee_name');
        if(request()->query('originating_office') == null){
            $this->originating_office = "";
        }
        else{
            $this->originating_office = request()->query('originating_office');
        }
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

        $cr_req = cenopac_request::where('employee_name',$this->id)
            ->where('position', $this->position)
            ->where('originating_office', $this->originating_office)
            ->where('purpose', $this->purpose)
            ->orWhere('id', $this->id)
            ->first();
        if($cr_req == null && $this->reject){
            cenopac_request::create([
                'employee_name' => $this->employee_name,
                'originating_office'=> $this->originating_office,
                'position' => $this->position,
                'purpose' => $this->purpose,
                'date_requested' => $this->date_requested,
                'status' => 'Denied',
            ]);
            session()->flash('failed', $this->employee_name .' has a record of on-going case/s');
            $this->reset('reject');  
            return redirect()->back();
        }elseif($this->reject){
            $cr_req->update([
                'status' => 'Denied',
            ]);
            session()->flash('failed', $this->employee_name .' has a record of on-going case/s');
            $this->reset('reject');  
            return redirect()->back();
        }elseif($cr_req != null){
            $cr_req->delete();
            pending_task::where('record_title', $this->employee_name)
            ->where('table_name', 'CeNoPac Request')
            ->orWhere('record_id', (string)$this->id)    
            ->delete();

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
        
        $this->legal_counsel = employees::where('current_position', 'University Legal Counsel')->first();
        $middle_name = ' ';
        if(!(is_null($this->legal_counsel->middle_name))){
            $middle_name = mb_substr($this->legal_counsel->middle_name, 0, 1) . '. ';
        }
        
        $this->legal_counsel = $this->legal_counsel->first_name . ' ' . $middle_name. $this->legal_counsel->last_name;  

        $cenopac = Pdf::loadView('pdf.generate_cenopac_cert', [
            'employee_name' => $this->employee_name,
            'originating_office' => $this->originating_office,
            'position' => $this->position,
            'date_issued' => $this->date_issued,
            'legal_counsel' => $this->legal_counsel,
        ]);

        
        $this->reset();
        return response()->streamDownload(function () use ($cenopac) {
            echo $cenopac->stream();
            }, 'cenopac_cert.pdf');
        
        

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
