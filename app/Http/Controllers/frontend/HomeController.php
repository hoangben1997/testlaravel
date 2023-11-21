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
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $category = Category::all(); 
        $brand = Brand::all();
        $productAll = Myproduct::orderBy('created_at', 'desc')->paginate(6);
        // $productAll = Myproduct::where('id_user',$id)->orderBy('created_at', 'desc')->paginate(6);
       
        return view('frontend.home', compact('productAll','category', 'brand'));
    }

    public function searchHome(Request $request)
    {
        // echo 1;
        // exit;
        $category = Category::all(); 
        $brand = Brand::all();
        $get = Myproduct::query();
        if ($request->searchName)
        {
            // simple where here or another scope, whatever you like
            $get->where('name', 'LIKE', "%{$request->searchName}%")->get();
        };
        $price = (int)$request->price;
        if ($price == 100)
        {
            $get->where('price', '<=', $price)->get();
        }
        if ($price == 500)
        {
            $get->where('price', '<=', $price)->where('price', '>', 100)->get();
        }
        if ($price == 1000)
        {
            $get->where('price', '<=', $price)->where('price', '>', 500)->get();
        }
        if ($price == 1500)
        {
            $get->where('price', '<=', $price)->where('price', '>', 1000)->get();
        }
        if ($price == 1501)
        {
            $get->where('price', '>', $price)->get();
        }
        
        if ($request->category)
        {
            // simple where here or another scope, whatever you like
            $get->where('id_category', 'LIKE', "%{$request->category}%")->get();
        };
        if ($request->brand)
        {
            // simple where here or another scope, whatever you like
            $get->where('id_brand', 'LIKE', "%{$request->brand}%")->get();
        };
        if ($request->status )
        {
            // simple where here or another scope, whatever you like
            $get->where('status', 'LIKE', "%{$request->status}%")->get();
        };

        if ($request->searchPrice) {
            $xx = explode(',', $request->searchPrice);
            $get->where('price', '<', (int)$xx[1])->get();
        }

        $productAll = $get->orderBy('created_at', 'desc')->paginate(6);
        // dd($productAll);
        

        return view('frontend.home', compact('productAll','category', 'brand'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function homeAjax(Request $request)
    {

        $category = Category::all(); 
        $brand = Brand::all();
        $x = $request->priceRange;
        $xx = explode(',', $x);
        $priceRange = $xx[1] - $xx[0];

        if (!empty($x)) {
            // $get = Myproduct::query()->where('price', '<', $xx[1])->get();
            // dd($productAll);
            $productAll = Myproduct::query()->where('price', '>', $xx[0])->get();
            return redirect('account/myproduct');
            // dd($productAll);
            // return view('frontend.home', compact('productAll','category', 'brand'));
        //     return view('frontend.account. account');
        
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
