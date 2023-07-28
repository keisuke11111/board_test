<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Deci;
use App\Models\Recruit;


use Illuminate\Support\Facades\Auth;


class BbsController extends Controller
{
    //
    public function index() {
        $user_id = Auth::user();
       
       
        if (empty($user_id)) {
             return view('auth/login');

         }else{
            $user= $user_id->id;
            $deci=Deci::where('user_id','=',$user)->value('join_id');
            $user_join=Recruit::where('id','=',$deci)->get();
            return view ('user_join',compact('user_join'));

         }

        
    }

    public function add(Request $request) {
        $request -> validate([
            'name' => 'required|max:10',
            'message' => 'required|max:30',
        ]);

        $name = $request -> name;
        $message = $request -> message;

        $data = [
            'view_name' => $name,
            'message' => $message
        ];

        Message::insert($data);

        return redirect('bbs');
    }

    public function delete($id) {
        Message::where('id',$id)
            -> update([
                'is_delete' => 1,
                'updated_at' => now()
            ]);
            return redirect('bbs');
    }
}
