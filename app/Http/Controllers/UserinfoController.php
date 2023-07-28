<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Encore\Admin\Facades\Admin;
use App\Models\User;
use App\Models\Point;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserinfoController extends Controller
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
        $rec_po=Point::where('user_id','=',$id)->get();
        return view ('history',compact('rec_po'));


        

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
    public function update(Request $request,$id)
    {
        //
        DB::transaction(function () use ($id, $request) {
            $article = User::find($id);
            $article->name = $request->input('name');
            $article-> tel = $request->input('tel');
            $article->sex = $request->input('sex');
            $article->email = $request->input('email');

            $article->save();
        });
        // CSRFトークンを破棄
        $request->session()->regenerateToken();
        return redirect(route('user.home.index'));   

        
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
