<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Myproduct;
use App\Models\Category;
use App\Models\Brand;
use Image;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cartAjax(Request $request)
    {
        // echo 1;
        $idSp = $_POST['getId'];
        $data = Myproduct::where('id',$idSp)->get()->toArray();
        // echo $idSp;

        $cart = [];
        $cart['id'] = $idSp;
        $cart['qty'] = 1;
        $cart['name'] = $data[0]['name'];
        $cart['price'] = $data[0]['price'];
        $cart['avatar'] = $data[0]['avatar'];
        
        if (session()->has('cart')) {
            $getSession = session()->get('cart');
            // dd($getSession);
            $demo = 1;
            foreach($getSession as $key => $value){

                if($idSp == $value['id']){
                    $getSession[$key]['qty'] += 1;
                    // echo $getSession[$key]['qty'];
                    session()->put('cart', $getSession);
                    // echo 2;
                    $demo = 0;
                }

            }
            if ($demo == 1) {
                session()->push('cart', $cart);
            }
        }else{
            session()->push('cart', $cart);
        }
      

        // $getSession = session()->get('cart');
        // session()->forget('cart');
        // dd($getSession);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        return view('frontend.account.cartproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request)
    {
        
        if (isset($_POST['id_up'])) {
            $getSession = session()->get('cart');
            foreach($getSession as $key => $value){
                // echo $value['id'];
                if ($value['id'] == $_POST['id_up']) {
                    // var_dump($getSession[$key]);
                    $getSession[$key]['qty'] += 1;
                    session()->put('cart', $getSession);
                }
            }
            
        }
        

        if (isset($_POST['id_down'])) {
            $getSession = session()->get('cart');
            foreach($getSession as $key => $value){
                // echo $value['id'];
                if ($value['id'] == $_POST['id_down']) {
                    // var_dump($getSession[$key]);
                    $getSession[$key]['qty'] -= 1;
                    session()->put('cart', $getSession);
                    // echo $_POST['a'];
                    if($getSession[$key]['qty'] == 0) 
                    {                 
                        unset($getSession[$key]);
                        session()->put('cart', $getSession);
                    }
                }
            }
        }

        
        if (isset($_POST['id_delete'])) {
            $getSession = session()->get('cart');
            foreach($getSession as $key => $value){
                // echo $value['id'];
                if ($value['id'] == $_POST['id_delete']) {
                    // var_dump($getSession[$key]);
                    unset($getSession[$key]);
                    session()->put('cart', $getSession);
                }
            }
        }

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
