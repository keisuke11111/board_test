<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use Illuminate\Http\Request;
use App\Models\Messages2;
use App\Models\Recruit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserjoinController extends Controller
{
    //
    public function index($id){

        $join_op=Recruit::where('id','=',$id)->value('title');
        session()->start();
        session()->put('op_id', $id);
        session()->save();
        $messages=Messages2::where('op_id','=',$id)->get();
    

           return view('chat',compact('join_op','id','messages'));
    }
    public function store(Request $request){

        $joinId = session()->put('op_id',3);
     
        $id=$request->input(['id']);
        $title=Recruit::where('id','=',$id)->value('title');

        $message2 = new Messages2();
        $message2->op_id = $request->input(['id']);
        $message2->title = $title;
        $message2->message = $request->input(['message']);
        $message2->save();
        
        event(new MessageCreated($message2));
        
        return redirect()->route('user.userjoin.index',['id' => $id]);



    }
    public function usershow(){
        $user_info = Auth::user();
    
    
        $user= $user_info->id;
        

        if (empty($user_info)) {
            
            
             return redirect()->route('user.login');

         }else{
             $user_info=User::where('id','=',$user)->get();

             return view('user_info',compact('user_info'));
         }


    }
}
