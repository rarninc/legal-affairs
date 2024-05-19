<?php

namespace App\Livewire;

use App\Models\case_matrix;
use App\Models\cenopac_request;
use App\Models\document_record;
use App\Models\pending_task;
use Livewire\Component;

class PendingTaskTable extends Component
{
    public function render()
    {
        
        return view('livewire.pending-task-table', [
            'pending_tasks' => pending_task::orderBy('created_at','ASC')->get(),
            'ctr' => 0,
        ]);
    }
}

