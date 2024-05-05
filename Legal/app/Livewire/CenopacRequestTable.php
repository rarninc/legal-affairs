<?php

namespace App\Livewire;

use App\Models\cenopac_record;
use App\Models\cenopac_request;
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
    public $date_requested='';
    public $originating_office='';
    public $id;

    public function edit_cenopac_request($id){
        $this->editing_id = $id;
        $cr = cenopac_request::find($this->editing_id);
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

        session()->flash('success','CeNoPac Request Updated Successfully');
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
        ];        
    }
    
    public function close(){
        $this->reset();
        $this->resetValidation();
    }

    public function fetchID($id){
        $this->id = $id;
    }

    public function delete(){
        cenopac_request::find($this->id)->delete();

    }

    public function generate(string $employee_name,string $originating_office, string $position, string $purpose, string $date_requested){
            $this->redirectRoute('cenopac', [
            'employee_name' => $employee_name, 
            'originating_office' =>$originating_office, 
            'position' =>$position, 
            'purpose' =>$purpose, 
            'date_requested' =>$date_requested]);
    }
}
