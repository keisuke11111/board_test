<?php

namespace App\Http\Controllers;
use App\Models\Join;


use Illuminate\Http\Request;

class op_homes extends Controller
{
    //
    public function op_home(){
        return view ('op_home');
    }
    public function join2(){
        $joins=Join::all();
        return view ('hope_join',compact('joins'));

    }
}