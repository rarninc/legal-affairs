<?php

namespace App\Livewire;

use App\Models\case_matrix;
use App\Models\cenopac_request;
use App\Models\document_record;
use App\Models\pending_task;
use Livewire\Component;

class PendingTaskTable extends Component
{
    public $tasks=[];

    // public function mount()
    // {
    //     $tasks = [];
    //     $ctr = 1;
    //     $case_matrix = case_matrix::where("status", "On-going")->get(['case_title','status','remarks']);
    //     foreach ($case_matrix as $record) {
    //         $tasks[] = [
    //             'no' => $ctr,
    //             'task_title' => $record->case_title,
    //             'task_type' => 'Case matrix',
    //             'status' => $record->status,
    //             'remarks' => $record->remarks
    //         ];
    //         $ctr += 1;
    //     }
    //     $document_record = document_record::where("status","To-Do")->orWhere("status","Doing")->get(['document_title','document_type','status','remarks']);
    //     foreach ($document_record as $record) {
    //         $tasks[] = [
    //             'no' => $ctr,
    //             'task_title' => $record->document_title,
    //             'task_type' => 'Process Document',
    //             'status' => $record->status,
    //             'remarks' => $record->remarks
    //         ];
    //         $ctr += 1;
    //     }
    //     $cenopac_request = cenopac_request::where("status", "Pending")->get(['employee_name','purpose','status']);
    //     foreach ($cenopac_request as $record) {
    //         $tasks[] = [
    //             'no' => $ctr,
    //             'task_title' => $record->employee_name,
    //             'task_type' => 'CeNoPAC Request',
    //             'status' => $record->status,
    //             'remarks' => ""
    //         ];
    //         $ctr += 1;
    //     }
    //     $this->tasks = $tasks;
    // }
    

    public function render()
    {
        
        return view('livewire.pending-task-table', [
            'pending_tasks' => pending_task::orderBy('created_at','ASC')->get()
        ]);
    }
}

