<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CenopacRequestController extends Controller
{
    public function index(){
        return view('cenopac_request');
    }
}
