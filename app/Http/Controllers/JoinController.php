<?php

namespace App\Http\Controllers;
use App\Models\Join;
use Illuminate\Support\Facades\Auth;
use App\Events\Joined;


use Illuminate\Http\Request;

class JoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = Auth::user();
       
        //$user= $user_id->id;
        if (empty($user_id)) {
             return view('auth/login');

         }else{
             return view('join');
         }
       // return view('join');


       
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'tel' => 'required|integer|max:25',
        //     'email' => 'required|string|email|max:255|',
        //     'sex' => 'required',
        // ]);

        

       
        $user = Auth('users')->user()->id;
    

        

        $joinId = session()->get('join_id');
        $join = new Join();
        $join->join_id=$joinId;
        $join->user_id=$user;
        $join->sex=$request->input(['sex']);
        $join->tel=$request->input(['tel']);
        $join->email=$request->input(['email']);
        $join->name=$request->input(['name']);
        $join->qu=$request->input(['text']);
        $join->save();

        event(new Joined($join));
        return('welcome');
      


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
