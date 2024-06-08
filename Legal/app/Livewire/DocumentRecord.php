<?php

namespace App\Livewire;

use App\Models\document_record;
use App\Models\document_record_history;
use App\Models\drs_documents;
use App\Models\pending_task;
use Livewire\Attributes\Url;
use Livewire\Component;

class DocumentRecord extends Component
{
    #[Url(history:true)]
    public $search = '';
    public $filter_status = '';
    public $id = '';
    public $document_title = '';
    public $document_type = '';
    public $tracking_no = '';
    public $from_office = '';
    public $to_office = null;
    public $date_received = '';
    public $date_released = null;
    public $progress_status = '';
    public $document_status = '';
    public $status_before = '';
    public $remarks = '';
    public $priority;
    public $progress_no = 0;

    public function render()
    {
        return view('livewire.document-record',
        [
            'document_record' => document_record::orderBy('date_received','desc')->search($this->search)
            ->when($this->filter_status !== '', function($query){
                $query->where('progress_status', $this->filter_status);
            })->get()
        ],
        [
            'document_record_history' => document_record_history::orderBy('version','desc')->where('id','like','%'.$this->id.'%')->get()
        ]);
    }

    public function mount(){
        $this->date_received = now()->format('Y-m-d');
    }
    
    public function edit_document_record($id){
        $this->id = $id;
        $dr = document_record::find($this->id);
        $pending_task = pending_task::where('record_id', $dr->tracking_no)->get();
        if ($pending_task->isNotEmpty()) {
            $this->progress_no = $pending_task->first()->progress_no;
            $this->priority = $pending_task->first()->priority;
        } else {
            $this->progress_no = 0;
        }
        $this->document_title = $dr->document_title;
        $this->document_type = $dr->document_type;
        $this->tracking_no = $dr->tracking_no;
        $this->from_office = $dr->from_office;
        $this->to_office = $dr->to_office;
        $this->date_received = $dr->date_received;
        $this->date_released = $dr->date_released;
        $this->remarks = $dr->remarks;
        $this->progress_status = $dr->progress_status;
        $this->document_status = $dr->document_status;
        $this->status_before = $this->progress_status;
    }

    public function create(){
        $this->validate();
        
        if($this->progress_status == 'To-Do' || $this->progress_status == 'In-Progress'){
            $this->validate([
                'progress_no' => 'required',
                'priority' => 'required',
            ]);
        }

        document_record::create([
            'document_title' => $this->document_title,
            'document_type'=> $this->document_type,
            'tracking_no' => $this->tracking_no,
            'from_office' => $this->from_office,
            'to_office' => $this->to_office,
            'date_received' => $this->date_received,
            'date_released' => $this->date_released,
            'progress_status' => $this->progress_status,
            'document_status' => $this->document_status,
            'remarks' => $this->remarks,
        ]);

        if($this->progress_status != 'Done'){
            pending_task::create([
                "table_name" => $this->document_type,
                "record_id" => $this->tracking_no,
                "record_title" => $this->document_title,
                "status" => $this->progress_status,
                "created_at" => now(),
                "progress_no" => $this->progress_no,
                "priority" => $this->priority,
            ]);
        }
        
        $this->reset(
            'document_title' ,
            'document_type',
            'tracking_no' ,
            'from_office' ,
            'to_office' ,
            'date_received' ,
            'date_released' ,
            'progress_status' ,
            'document_status',
            'remarks',
            'progress_no',
            'priority' 
        );
        session()->flash('success','CeNoPac Request Added Successfully');
        $this->dispatch('rerender');
        return redirect()->back();

    }

    public function update_doc(){
        $this->validate();

        if($this->progress_status == 'To-Do' || $this->progress_status == 'In-Progress'){
            $this->validate([
                'progress_no' => 'required',
                'priority' => 'required',
            ]);
        }
        if($this->progress_status != "In-Progress"){
            $this->document_status = null;
        }
        if($this->progress_status != "Done"){
            $this->date_released = null;
        }
        
        document_record::find($this->id)->update([
            'document_title' => $this->document_title,
            'document_type'=> $this->document_type,
            'tracking_no' => $this->tracking_no,
            'from_office' => $this->from_office,
            'to_office' => $this->to_office,
            'date_received' => $this->date_received,
            'date_released' => $this->date_released,
            'progress_status' => $this->progress_status,
            'document_status' => $this->document_status,
            'remarks' => $this->remarks,
        ]);
        $this->progress_no = ($this->progress_status == 'To-Do') ? 0 : $this->progress_no;
        if($this->progress_status == 'Done'){
            pending_task::where('record_id', $this->tracking_no)
            ->delete(); 
        }
        elseif($this->status_before == 'Done'){
            if($this->progress_status == 'To-Do' || $this->progress_status == 'In-Progress'){
                pending_task::create([
                    "table_name" => $this->document_type,
                    "record_id" => $this->tracking_no,
                    "record_title" => $this->document_title,
                    "status" => $this->progress_status,
                    "created_at" => now(),
                    "progress_no" => $this->progress_no,
                    "priority" => $this->priority,
                ]);
            }
        }
        else{
            pending_task::where('record_id', $this->tracking_no)->update([
                'progress_no' => $this->progress_no,
                'priority' => $this->priority,
            ]);
        }
        
        session()->flash('success','Document Record Updated Successfully');
        $this->dispatch('rerender');
    }
    
    public function view_document_history($id){ 
        $this->id = $id;
        $dr = document_record::find($this->id);
        $this->document_title = $dr->document_title;
        $this->document_type = $dr->document_type;
        $this->tracking_no = $dr->tracking_no;
        $this->from_office = $dr->from_office;
        $this->to_office = $dr->to_office;
        $this->date_received = $dr->date_received;
        $this->date_released = $dr->date_released;
        $this->remarks = $dr->remarks;
        $this->progress_status = $dr->progress_status;
        $this->document_status = $dr->document_status;
        $this->status_before = $this->progress_status;
    }

    public function update_date_released($progress_status){
        if($progress_status == "Done" && is_null($this->date_released)){
            $this->date_released = date('Y-m-d');
        }
        elseif(!(is_null($this->date_released))){
            return;
        }
        else{
            $this->date_released = null;
        }
    }
    
    public function close(){
        $this->resetExcept('filter_status', 'search');
        $this->resetValidation();
    }
    
    public function rules(){
        return [
            'document_title'=> 'required|max:100',
            'document_type'=> 'required|max:100',
            'tracking_no' => ['required','max:255','regex:/^\d{4}-\d{4}-\d{4}-\d{4}+$/','exists:drs_documents,tracking_number'],
            'date_received' => 'required',
            'from_office' => 'required|max:100',
            'to_office' => 'max:100',
            'progress_status' => 'required',
            'remarks' => 'max:255',
        ];
    }
    public function updatedTrackingNo($value)
    {
        $trackingNumber = drs_documents::where('tracking_number', $value)->first();
        if ($trackingNumber) {
            $this->document_type = $trackingNumber->type;
            $this->document_title = $trackingNumber->title;
        } else {
            $this->document_type = '';
            $this->document_title = '';
        }
    }
}
