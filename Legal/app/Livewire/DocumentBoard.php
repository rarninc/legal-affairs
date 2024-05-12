<?php

namespace App\Livewire;

use App\Models\document_record;
use Livewire\Component;

class DocumentBoard extends Component
{

    public function render()
    {
        return view('livewire.document-board', [
            "dr_to_do" => document_record::where("status","To-Do")->get(),
            "dr_doing" => document_record::where("status","Doing")->get(),
            "dr_done" => document_record::where("status","Done")->get(),
        ]
        );
    }
}
