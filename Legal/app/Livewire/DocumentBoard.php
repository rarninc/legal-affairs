<?php

namespace App\Livewire;

use App\Models\document_record;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class DocumentBoard extends Component
{
    #[On('rerender')]
    public function render()
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $dr_done = document_record::whereYear('date_released',$currentYear)
            ->whereMonth('date_released', $currentMonth)
            ->where('status', 'Done')
            ->get();
        return view('livewire.document-board', [
            "dr_to_do" => document_record::where("status","To-Do")->get(),
            "dr_doing" => document_record::where("status","Doing")->get(),
            "dr_done" => $dr_done,
        ]
        );
    }
}
