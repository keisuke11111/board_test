<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Join;
use App\Models\Deci;
use Illuminate\Support\Facades\DB;

class HopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
    }

    /**
     * Show the form for creating a new resource.
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
         
         $deci = new Deci();
         $deci->join_id=$request->input(['join_id']);
         $deci->user_id=$request->input(['user_id']);
         $deci->name=$request->input(['name']);
         $deci->qu=$request->input(['qu']);
         $deci->email=$request->input(['email']);
         $deci->tel=$request->input(['tel']);
         $deci->sex=$request->input(['sex']);
         $deci->jug=$request->input(['jug']);
         $deci->save();
         $id=$request->id;

         DB::transaction(function () use ($id) {
            Join::destroy($id);    //テーブルの内容を変更する処理
        });
         return redirect()->route('admin.join2.index');


 
 
 
         // if($request->hasFile('img_path')){
         //     $file=$request->file('img_path');
         //     $image =Storage::disk('public')->put('/image/',$request->$file);
         //     $deci->img_path=$image;
 
         // }else{
 
         // }
 
         
         
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    
    {
        //
    
        $joins=Join::where('join_id','=',$id)->get();
    
        return view('hope_join',compact('joins'));
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
    public function destroy(Request $request)
    {
        //

        // ddd($request->input());
        // $deci = new deci();
        //  $deci->join_id=
        //  $deci->user_id=
        //  $deci->name=$request->input(['name']);
        //  $deci->qu=$request->input(['qu']);
        //  $deci->email=$request->input(['email']);
        //  $deci->tel=$request->input(['tel']);
        //  $deci->sex=$request->input(['sex']);
        //  $deci->jug=$request->input(['jug']);
        //  $deci->save();
        //  $id=$request->id;

        //  DB::transaction(function () use ($id) {
        //     Join::destroy($id);    //テーブルの内容を変更する処理
        // });
        // //  return redirect()->route('admin.join2.index');

    }
}
