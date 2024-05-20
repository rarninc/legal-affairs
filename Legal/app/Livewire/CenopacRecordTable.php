<?php

namespace App\Livewire;

use App\Models\cenopac_record;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class CenopacRecordTable extends Component
{
    use WithPagination;
    #[Url(history:true)]
    public $search = '';
    #[Url(history:true)]
    public $perPage = 14;
    #[Url(history:true)]
    public $sortBy = 'date_issued';
    #[Url(history:true)]
    public $sortDir = 'desc';
    
    public function render()
    {
        return view('livewire.cenopac-record-table',
        [
         'cenopac_record' => cenopac_record::orderBy($this->sortBy,$this->sortDir)->search($this->search)->paginate($this->perPage)
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
