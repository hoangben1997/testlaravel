<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestDns;
use App\Models\Cloudflare;

class CloudflareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adddns()
    {
        return view('cloudflare.adddns');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatedns(RequestDns $request)
    {
        $data = $request->all();
        $table =new cloudflare();
        $table->tenmien = $_POST['tenmien'];
        $table->target = $_POST['target'];
        $table->type = $_POST['type'];
        $table-> save();
        return redirect('/indexdns');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function indexdns()
    {
        $table = Cloudflare::all();
        //$phantrang = Blog::paginate(3);
        return view('cloudflare.indexdns',compact('table'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletedns($id)
    {
        Cloudflare::where('id',$id)->delete();
        return redirect('/indexdns');
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
