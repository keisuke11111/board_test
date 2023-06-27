<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruit;
use Illuminate\Support\Facades\Storage;
class BoshuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return view('boshu');
       
       // $recruits=Recruit::all();
       // return view('op_home',compact('recruits'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $recruit=Recruit::all();
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
        // !--ddd($request->hasFile('img_path'));
        $image=$request->file('img_path');
        $path = isset($image) ? $image->store('image', 'public') : '';
       // $image_path = $request->file('img_path')->store('public/images/');
        
        $recruit=new Recruit();
        $recruit->id=1;
        $recruit->op_id=1;
        $recruit->title=$request->input(['title']);
        $recruit->period=$request->input(['period']);
        $recruit->time=$request->input(['time']);
        $recruit->money=$request->input(['money']);
        $recruit->capacity=$request->input(['capacity']);
        $recruit->human=$request->input(['human']);
        $recruit->place=$request->input(['place']);
        $recruit->address=$request->input(['address']);
        $recruit->coment=$request->input(['coment']);
        $recruit->b_boshu=$request->input(['b_boshu']);
        $recruit->img_path=basename($path);



        // if($request->hasFile('img_path')){
        //     $file=$request->file('img_path');
        //     $image =Storage::disk('public')->put('/image/',$request->$file);
        //     $recruit->img_path=$image;

        // }else{

        // }

        $recruit->save();
        return('op_home');
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
