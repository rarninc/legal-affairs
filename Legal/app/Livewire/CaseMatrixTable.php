<?php

namespace App\Livewire;

use App\Models\case_matrix;
use App\Models\case_matrix_history;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Node\Expr\FuncCall;

class CaseMatrixTable extends Component
{
    use WithPagination;
    #[Url(history:true)]
    public $search = '';
    #[Url(history:true)]
    public $perPage = 12;
    #[Url(history:true)]
    public $sortBy = 'case_docket';
    #[Url(history:true)]
    public $sortDir = 'desc';
    #[Url(history:true)]
    public $filter_status = '';
    public $case_docket='';
    public $employee_name='';
    public $case_title='';
    public $charge='';
    public $offense='';
    public $assigned_officer='';
    public $date_issued='';
    public $date_resolved='';
    public $status='';
    public $remarks='';
    public $editing_cm_docket;


    public function mount(){
        $this->search = request()->query('employee_name');
        $this->date_issued = now()->format('Y-m-d');
    }

    public function create(){
        $valid = $this->validate();
        
        case_matrix::create($valid);
        session()->flash('success','Case Added Successfully');
        
        $this->reset();
        return redirect()->back();        
    }
    
    public function close(){
        $this->resetExcept('filter_status', 'search');
        $this->resetValidation();
    }

    public function edit_case_record(string $case_docket){
        $this->editing_cm_docket = $case_docket;
        $cm = case_matrix::find($this->editing_cm_docket);
        $this->case_docket = $this->editing_cm_docket ;
        $this->employee_name = $cm->employee_name;
        $this->case_title = $cm->case_title;
        $this->charge = $cm->charge;
        $this->offense = $cm->offense;
        $this->assigned_officer = $cm->assigned_officer;
        $this->date_issued = $cm->date_issued;
        $this->date_resolved = $cm->date_resolved;
        $this->status = $cm->status;
        $this->remarks = $cm->remarks;
    }
    
    public function update(){
        $this->validate([
            'employee_name' => 'required|max:50',
            'case_title'=> 'required|max:100',
            'charge' => 'required|max:100',
            'offense' => 'required|max:100',
            'assigned_officer' => 'required|max:50',
            'date_issued' => 'required',
            'status' => 'required',
            'remarks' => 'max:255'
        ]);
        
    

        case_matrix::find($this->editing_cm_docket)->update([
            'employee_name' => $this->employee_name,
            'case_title'=> $this->case_title,
            'charge' => $this->charge,
            'offense' => $this->offense,
            'assigned_officer' => $this->assigned_officer,
            'date_issued' => $this->date_issued,
            'date_resolved' => $this->date_resolved,
            'status' => $this->status,
            'remarks' => $this->remarks,
        ]);
        
        session()->flash('success','Case Updated Successfully');
        
    }

    public function update_date_resolved($status){
        if($status == "Resolved"){
            $this->date_resolved = date('Y-m-d');
        }
        else{
            $this->date_resolved = null;
        }
    }

    public function render()
    {
        return view('livewire.case-matrix-table',
        [
            'case_matrix' => case_matrix::orderBy($this->sortBy,$this->sortDir)->search($this->search)
            ->when($this->filter_status !== '', function($query){
                $query->where('status', $this->filter_status);
            })            
            ->paginate($this->perPage)
        ],
        [
            'case_matrix_history' => case_matrix_history::orderBy('version','DESC')->where('case_docket','like','%'.$this->case_docket.'%')->get()
        ]);
    }
    public function updatedSearch(){
        $this->resetpage();
    }

    public function view_case_history(string $casedocket, string $employee_name,string $case_title, string $charge, string $offense, string $assigned_officer, string $date_issued, string $date_resolved, string $status, string $remarks){
        $this->case_docket = $casedocket;
        $this->employee_name = $employee_name;
        $this->case_title = $case_title;
        $this->charge = $charge;
        $this->offense = $offense ;
        $this->assigned_officer = $assigned_officer;
        $this->date_issued = $date_issued;
        $this->date_resolved = $date_resolved;
        $this->status = $status;
        $this->remarks = $remarks;
    }

    public function setSortby($sortBy){
        if($this->sortBy === $sortBy){
            $this->sortDir = ($this->sortDir == 'asc') ?'desc':'asc';
            return;
        }

        $this->sortBy = $sortBy;
        $this->sortDir = 'desc';
    }

    public function rules(){
        return [
            'employee_name' => 'required|max:50',
            'case_title'=> 'required|max:100',
            'charge' => 'required|max:100',
            'offense' => 'required|max:100',
            'assigned_officer' => 'required|max:50',
            'case_docket' => ['required','max:8','unique:case_matrix,case_docket','regex:/^\d{4}-\d{3}+$/'],
            'date_issued' => 'required',
            'status' => 'required',
            'remarks' => 'max:255'
        ];
    }
}