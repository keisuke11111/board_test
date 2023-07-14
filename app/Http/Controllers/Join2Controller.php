<?php

namespace App\Http\Controllers;
use App\Events\MessageCreated;

use Illuminate\Http\Request;
use App\Models\Join;
use App\Models\Deci;
use APP\Models\Recruit;
use APP\Models\Messages2;

use Recruits;

class Join2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $joins=Join::all();
        return view ('hope_join',compact('joins'));

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
    public function store(Request $request,$id)
    {
        //
       




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id,$join_id)
    {
        //
    
        //$join = Join::find($user_id);
        
        $join=Join::where('user_id','=',$user_id)->get();
        $rec=Recruit::where('id','=',$join_id)->get();
    

    
        return view('detail2',compact('join','rec'));
    


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
