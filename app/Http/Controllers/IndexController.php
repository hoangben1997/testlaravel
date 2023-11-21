<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('cauthu')->get()->toArray();
        // dd($danhsach);
        // echo 1;
        return view('cauthu.indexcauthu',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cauthu.addcauthu');
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
        
        DB::table('cauthu')->insert(
        ['ten'=> $_POST['tencauthu'],
        'tuoi'=> $_POST['tuoi'],
        'quoctich'=> $_POST['quoctich'],
        'vitri'=> $_POST['vitri'],
        'luong'=> $_POST['luong'],
        ]
        );
        return view('cauthu.addcauthu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('cauthu')->where('id',$id)->get();
        // dd ($data);
        return view('cauthu.editcauthu',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
       
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
        $data = DB::table('cauthu')->where('id',$id)->update(
        ['ten'=> $_POST['tencauthu'],
        'tuoi'=> $_POST['tuoi'],
        'quoctich'=> $_POST['quoctich'],
        'vitri'=> $_POST['vitri'],
        'luong'=> $_POST['luong'],
        ]);
        return view('cauthu.editcauthu');
    }

    public function delete($id)
    {
        $data = DB::table('cauthu')->where('id','=',$id)->delete();
        return view('cauthu.deletecauthu');
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
