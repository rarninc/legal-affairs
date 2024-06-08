<?php

namespace App\Http\Composers;

use App\Models\employees;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class IdComposer
{
    public function compose(View $view)
    {
      	// $id = Session::get('user_id');
        $id = '202410046';
      	if($id == null){
         	return redirect('/access-denied');
        }
        $user_name = employees::where("employee_id", $id)->first();
        $user_name_fn = $user_name->first_name . " ". $user_name->middle_name . " " . $user_name->last_name;
        $view->with('fullname', $user_name_fn);
        $view->with('user_name', $user_name->first_name);
    }
}
