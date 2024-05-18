<?php

namespace App\Livewire;

use App\Models\cenopac_record;
use App\Models\cenopac_request;
use App\Models\pending_task;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class CenopacRequestTable extends Component
{
    use WithPagination;
    #[Url(history:true)]
    public $search = '';
    #[Url(history:true)]
    public $perPage = 12;
    #[Url(history:true)]
    public $sortBy = 'date_requested';
    #[Url(history:true)]
    public $sortDir = 'desc';
    public $filter_status = '';
    public $editing_id;
    public $employee_name='';
    public $position='';
    public $purpose='';
    public $status='';
    public $date_requested;
    public $originating_office='';
    public $priority;
    public $progress_no = 0;
    public $id;

    public function edit_cenopac_request($id){
        $this->editing_id = $id;
        $cr = cenopac_request::find($this->editing_id);
        $pending_task = pending_task::where('record_id', $this->editing_id)->where('record_title', $cr->employee_name)->get();
        if ($pending_task->isNotEmpty()) {
            $this->progress_no = $pending_task->first()->progress_no;
            $this->priority = $pending_task->first()->priority;
        } else {
            $this->progress_no = 0;
        }
        $this->employee_name = $cr->employee_name;
        $this->originating_office = $cr->originating_office;
        $this->position = $cr->position;
        $this->purpose = $cr->purpose;
        $this->status = $cr->status;
        $this->date_requested = $cr->date_requested;
    }

    public function update(){
        $this->validate();
        
        cenopac_request::find($this->editing_id)->update([
            'employee_name' => $this->employee_name,
            'originating_office'=> $this->originating_office,
            'position' => $this->position,
            'purpose' => $this->purpose,
            'date_requested' => $this->date_requested,
            'status' => $this->status,
        ]);

        pending_task::where('record_id', (string) $this->editing_id)
            ->where('record_title', $this->employee_name)
            ->update([
            'progress_no' => $this->progress_no,
            'priority' => $this->priority,
        ]);

        session()->flash('success','CeNoPac Request Updated Successfully');
    }

    public function updatedSearch(){
        $this->resetpage();
    }

    public function setSortby($sortBy){
        if($this->sortBy === $sortBy){
            $this->sortDir = ($this->sortDir == 'asc') ?'desc':'asc';
            return;
        }

        $this->sortBy = $sortBy;
        $this->sortDir = 'desc';
    }
    
    public function create(){
        $this->status = "Pending";
        $this->validate();
        cenopac_request::create([
            'employee_name' => $this->employee_name,
            'originating_office'=> $this->originating_office,
            'position' => $this->position,
            'purpose' => $this->purpose,
            'date_requested' => $this->date_requested,
            'status' => $this->status,
        ]);
        $current_record_id = DB::table('cenopac_request')->max('id');
        pending_task::create([
            "table_name" => 'CeNoPac Request',
            "record_id" => (string) $current_record_id,
            "record_title" => $this->employee_name,
            "status" => $this->status,
            "created_at" => now(),
            "progress_no" => $this->progress_no,
            "priority" => $this->priority,
        ]);
        $this->reset();
        session()->flash('success','CeNoPac Request Added Successfully');
        return redirect()->back();
    }

    public function rules(){
        return [
            'employee_name' => 'required|max:50',
            'originating_office'=> 'required|max:100',
            'position' => 'required|max:100',
            'purpose' => 'required|max:100',
            'date_requested' => 'required',
            'status' => 'required',
            'progress_no' => 'required',
            'priority' => 'required',
        ];        
    }
    
    public function close(){
        $this->resetExcept('filter_status', 'search');
        $this->resetValidation();
    }

    public function fetchID($id){
        $this->id = $id;
    }

    public function delete(){
        cenopac_request::find($this->id)->delete();
        pending_task::where('record_id', (string)$this->id)->delete();
    }

    public function render()
    {
        return view('livewire.cenopac-request-table',
        [
            'cenopac_request' => cenopac_request::orderBy($this->sortBy,$this->sortDir)->search($this->search)
            ->when($this->filter_status !== '', function($query){
                $query->where('status', $this->filter_status);
            })
            ->paginate($this->perPage)
           ]);
    }
}
