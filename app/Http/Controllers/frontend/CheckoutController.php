<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Myproduct;
use Auth;
use DB;
use Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkOut()
    {
        return view('frontend.checkout.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMail(Request $request)
    {
        // - neu chua dk thi dk, => email
        // - neu da login roi thi e lay email trong auth:Auth::user()->email

        // $id_user = Auth::id();
        $user = Auth::user();
        dd($user['email']);
        $getRequest = $request->all();
        // dd($getRequest);
        // echo 1;
        // exit;
        $idProduct = session()->get('cart');
        // dd($idProduct);

        foreach($idProduct as $key => $value){
            $product[] = Myproduct::find($value['id'])->toArray();
            // var_dump($value['id']);
            // exit;
            $product[$key]['qty'] = $value['qty'];
        };
        // dd($product);

        $sum = 0;
        foreach($product as $key => $value){
            $price = (int)str_replace('$','',$value['price']);
            
            $sum = $sum + $price*$value['qty'];
            // dd($value['price']);
        };

        // $emailTo = $getRequest["email"];
        $emailTo = Auth::user()->email;
        // dd($emailTo);
        $subject = "Mail order product";
        Mail::send('frontend.checkout.mail',
            array(
                'product' => $product,
                'sum' => $sum
            ),
            function ($message) use ($subject, $emailTo){
                $message->from('nviethoang2809@gmail.com', 'Mail order product');
                $message->to($emailTo);
                $message->subject($subject);
            });
        session()->forget('cart');
        return view('frontend.account.cartproduct');
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
