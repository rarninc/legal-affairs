<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentRecordController extends Controller
{
    public function index(){
        return view('document_record');
    }
}
