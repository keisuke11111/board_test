<?php

namespace App\Http\Controllers;
use App\Models\Join;
use App\Models\Recruit;
use App\Models\Deci;


use Illuminate\Http\Request;

class op_homes extends Controller
{
    //
    public function op_home(){
        return view ('op_home');
    }
    public function join2($user_id, $join_id){
        $join=Join::where('user_id','=',$user_id)->get();
        $rec=Recruit::where('id','=',$join_id)->get();

        return view('detail2',compact('join','rec'));
       

    }
    public function deci($id){
        
        $deci=Deci::Where('join_id','=',$id)->where('jug','=',1)->get();
        return view ('deci',compact('deci'));
    }
  

    
}