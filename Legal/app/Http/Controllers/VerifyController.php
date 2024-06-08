<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifyController extends Controller
{
    public function index()
    {
        $id = Session::get('user_id');
      	if($id == '202410046'){
      			
        	return redirect('/dashboard');
        }
        return redirect('/access-denied'); 
        
    }
}
