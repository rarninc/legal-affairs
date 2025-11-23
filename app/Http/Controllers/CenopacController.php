<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CenopacController extends Controller
{
    public function index(){
        return view('cenopac');
    }
}
