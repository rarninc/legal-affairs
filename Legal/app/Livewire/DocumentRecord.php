<?php

namespace App\Livewire;

use App\Models\document_record;
use App\Models\document_record_history;
use Livewire\Attributes\Url;
use Livewire\Component;

class DocumentRecord extends Component
{
    #[Url(history:true)]
    public $search = '';
    public $filter_status = '';
    public $id = '';
    public function render()
    {
        return view('livewire.document-record',
        [
            'document_record' => document_record::orderBy('date_received','desc')->search($this->search)
            ->when($this->filter_status !== '', function($query){
                $query->where('status', $this->filter_status);
            })->get()
        ],
        [
            'document_record_history' => document_record_history::orderBy('version','desc')->where('id','like','%'.$this->id.'%')->get()
        ]);
    }
    
    public function rules(){
        return [
            'document_title'=> 'required|max:100',
            'document_type'=> 'required|max:100',
            'date_received' => 'required',
            "from_office" => 'required|max:100',
            "to_office" => 'max:100',
            'remarks' => 'max:255',
            'tracking_no' => ['required','max:20','regex:/^\d{4}-\d{4}-\d{4}-\d{4}+$/'],
        ];
    }
}
