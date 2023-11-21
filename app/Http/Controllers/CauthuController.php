<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Http\Requests\LoginRequest;

class CauthuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    
    public function index()
    {
        Customers::all();
        $table = Customers::all();
        return view('cauthu.indexcauthu',compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cauthu.addcauthu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        
        $table =new Customers();
        $table -> ten=$_POST['tencauthu'];
        $table -> tuoi = $_POST['tuoi'];
        $table -> quoctich = $_POST['quoctich'];
        $table -> vitri = $_POST['vitri'];
        $table -> luong = $_POST['luong'];
        $table -> save();
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
        $table = Customers::where('id',$id)->get();
        return view('cauthu.editcauthu',compact('table'));
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
        Customers::where('id',$id)->update(
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
        Customers::where('id',$id)->delete();
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
