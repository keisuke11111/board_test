<?php

namespace App\Http\Controllers;

use App\Models\Deci;

use Illuminate\Http\Request;

class deciController extends Controller
{
    //
    public function info($user_id, $created_at){
      
        $info=Deci::where('user_id','=',$user_id)->where('created_at','=',$created_at)->get();
//$info=Recruit::where('id','=',$join_id)->get();

        return view('info',compact('info'));
       

    }
}
