<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class Bbs_userController extends Controller
{
    public function index() {
        $bbs_data = Message::where('is_delete',0) -> orderBy('id','desc') -> paginate(5);
        return view('bbs_user',compact('bbs_data'));
    }

    // クリックしたボランティアの詳細を表示する
    public function detail($id) {
        // $detail = Message::where('id',$id);
        // $detail = Message::find($id);
        $detail = Message::get() -> where('id',$id);
        return view('volun_parti',compact('detail'));
    }
}
