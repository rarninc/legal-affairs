<?php

namespace App\Livewire;

use App\Models\document_record;
use Livewire\Attributes\On;
use Livewire\Component;

class DocumentBoard extends Component
{
    #[On('rerender')]
    public function render()
    {
        return view('livewire.document-board', [
            "dr_to_do" => document_record::where("progress_status","To-Do")->get(),
            "dr_in_progress" => document_record::where("progress_status","In-Progress")->get(),
        ]
        );
    }
}
