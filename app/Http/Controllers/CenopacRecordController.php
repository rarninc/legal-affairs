<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CenopacRecordController extends Controller
{
    public function index(){
        return view('cenopac_record');
    }
}
