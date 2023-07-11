<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruit;

class homeController extends Controller
{
    //
    public function index(){
        $recruits=Recruit::all();
       return view('home',compact('recruits'));
       }

}
