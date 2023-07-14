<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;


class PointController extends Controller
{
    public function create(Request $request) {

        $user = $request->user();

        return view('point.create')->with([
            'user' => $user
        ]);

    }

    public function store(Request $request,$user_id,$join_id) {

        
        $user = Auth('admins')->user()->id;
        $op_name=Admin::where('id','=',$user)->value('name');
      
        $join=$request->input(['join_id']);


        // バリデーションは省略しています

        $points = new Point();
        //$points->join_id=
        $points->user_id=$user_id;
        $points->join_id=$join_id;
        if(empty($request->input(['review']))){
            $points->point=0;
        }
        $points->point=$request->input(['review']);
        $points->points_added+=$points->point;

        $points->op_name=$op_name;
        $points->points_used=0;
        $points->save();



        return redirect()->route('user.op_homes.deci',['id' => $join_id]);

        // $user_id = auth()->id();
        // $using_points = intval($request->using_points);
        // $valid_points = Point::whereValid($user_id)->get();

        // return ['result' => true];


    }
}
