<?php

namespace App\Livewire;

use App\Models\document_record;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentView extends Component
{
    use WithPagination;
    #[Url(history:true)]
    public $search = '';
    #[Url(history:true)]
    public $perPage = 14;
    #[Url(history:true)]
    public $sortBy = 'tracking_no';
    #[Url(history:true)]
    public $sortDir = 'desc';
    #[Url(history:true)]
    public $filter_status = '';
    public function render()
    {
        return view('livewire.document-view',
        [
            'document_record' => document_record::orderBy($this->sortBy,$this->sortDir)->search($this->search)
            ->when($this->filter_status !== '', function($query){
                $query->where('progress_status', $this->filter_status);
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
}
