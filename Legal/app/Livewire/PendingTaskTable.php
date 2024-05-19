<?php

namespace App\Livewire;

use App\Models\case_matrix;
use App\Models\cenopac_request;
use App\Models\document_record;
use App\Models\pending_task;
use Livewire\Attributes\Url;
use Livewire\Component;

class PendingTaskTable extends Component
{
    #[Url(history:true)]
    public $sortBy = 'created_at';
    #[Url(history:true)]
    public $sortDir = 'desc';
    public function setSortby($sortBy){
        if($this->sortBy === $sortBy){
            $this->sortDir = ($this->sortDir == 'asc') ?'desc':'asc';
            return;
        }

        $this->sortBy = $sortBy;
        $this->sortDir = 'desc';
    }
    public function render()
    {
        
        return view('livewire.pending-task-table', [
            'pending_tasks' => pending_task::orderBy($this->sortBy,$this->sortDir)->get(),
            'ctr' => 0,
        ]);
    }
}

