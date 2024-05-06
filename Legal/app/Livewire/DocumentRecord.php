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
    public $document_title = '';
    public $document_type = '';
    public $tracking_no = '';
    public $from_office = '';
    public $to_office = null;
    public $date_received = '';
    public $date_released = null;
    public $status = '';
    public $remarks = '';

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
    
    public function edit_document_record($id){
        $this->id = $id;
        $dr = document_record::find($this->id);
        $this->document_title = $dr->document_title;
        $this->document_type = $dr->document_type;
        $this->tracking_no = $dr->tracking_no;
        $this->from_office = $dr->from_office;
        $this->to_office = $dr->to_office;
        $this->date_received = $dr->date_received;
        $this->date_released = $dr->date_released;
        $this->remarks = $dr->remarks;
        $this->status = $dr->status;
    }

    public function create(){
        $this->validate();

        document_record::create([
            'document_title' => $this->document_title,
            'document_type'=> $this->document_type,
            'tracking_no' => $this->tracking_no,
            'from_office' => $this->from_office,
            'to_office' => $this->to_office,
            'date_received' => $this->date_received,
            'date_released' => $this->date_released,
            'status' => $this->status,
            'remarks' => $this->remarks,
        ]);
        
        $this->reset(
            'document_title' ,
            'document_type',
            'tracking_no' ,
            'from_office' ,
            'to_office' ,
            'date_received' ,
            'date_released' ,
            'status' ,
            'remarks' 
        );
        session()->flash('success','CeNoPac Request Added Successfully');
        return redirect()->back();

    }

    public function update_doc(){
        $this->validate();

        document_record::find($this->id)->update([
            'document_title' => $this->document_title,
            'document_type'=> $this->document_type,
            'tracking_no' => $this->tracking_no,
            'from_office' => $this->from_office,
            'to_office' => $this->to_office,
            'date_received' => $this->date_received,
            'date_released' => $this->date_released,
            'status' => $this->status,
            'remarks' => $this->remarks,
        ]);
        
        session()->flash('success','Document Record Updated Successfully');

    }

    public function close(){
        $this->reset();
        $this->resetValidation();
    }
    
    public function rules(){
        return [
            'document_title'=> 'required|max:100',
            'document_type'=> 'required|max:100',
            'tracking_no' => ['required','max:20','regex:/^\d{4}-\d{4}-\d{4}-\d{4}+$/'],
            'date_received' => 'required',
            'from_office' => 'required|max:100',
            'to_office' => 'max:100',
            'status' => 'required',
            'remarks' => 'max:255',
        ];
    }
}
