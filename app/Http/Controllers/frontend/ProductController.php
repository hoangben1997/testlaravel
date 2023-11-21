<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Myproduct;
use App\Models\Category;
use App\Models\Brand;
use Image;
use Auth;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myproduct()
    {
        $id = Auth::id();
        $product = Myproduct::where('id_user',$id)->get();
        return view ('frontend.account.myproduct', compact('product'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nhapproduct()
    {
        $category = Category::all(); 
        $brand = Brand::all();
        return view ('frontend.account.addproduct', compact('category','brand'));
    }


    public function addproduct(Request $request)
    {
        $id_user = Auth::id();
        // dd($id_user);
        $category = Category::all(); 
        // $id = Category::find('id_category');
        $brand = Brand::all();
    
        if($request->hasfile('avatar'))
        {
            $xx= $this->handleFile($request->file('avatar'));
            
        }
        if (!empty($xx)) {
            $soluong = count($xx);
            if (count($xx) <= 3) {
                $product= new Myproduct();
                $product->name = $request->name;
                $product->price = $request->price;
                $product->id_user = Auth::id();
                $product->id_category = $request->category;
                $product->id_brand = $request->brand;
                $product->status = $request->status;
                $product->sale = !empty($request->status == 1) ? "" : $request->sale;
                $product->company = $request->company;  
                $product->avatar = json_encode($xx);
                $product->detail= $request->detail;
                $product->save();
                return redirect('account/myproduct')->with('success', 'sp up thanh cong');
            }else{
                return back()->withErrors('khong dc up qua 3 hinh');
            }
        }else{
            return back()->withErrors('up hinh anh');
        }
        

       
    
    }


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editproduct($id)
    {
        $category = Category::all(); 
        $brand = Brand::all();
        $product = Myproduct::where('id',$id)->get();
        return view ('frontend.account.editproduct', compact('product','category','brand'));
    }

   

    public function updateproduct(Request $request,$id)
    {
        $id_user = Auth::id();
       
        if($request->hasfile('avatar') )
        {
            
            $xx= $this->handleFile($request->file('avatar'));
            // dd($xx);
            // exit;   
        
        }

        $getHinhcu = Myproduct::where('id',$id)->get()->toArray();
        $hinhcu = json_decode($getHinhcu[0]['avatar'], true);
        // dd($getHinhcu[0]);
        // dd($hinhcu);
        if ($request->hinhxoa != null) {
            $hinhxoa = $request->hinhxoa;
            
            $count = count($hinhxoa);
            for ($i=0; $i < $count; $i++) { 
                $key = array_search($hinhxoa[$i], $hinhcu);
                unset($hinhcu[$key]);
            }

             
        }

        $hinhcuok = array_values($hinhcu);
        
        if (!empty($xx)) {
            $allImg = array_merge($hinhcu, $xx);
            $soluong = count($allImg);
            if ($soluong > 3) {
            return back()->withErrors('Tổng ảnh data chỉ được up 3 hinh, phải xóa mới up thêm dc');
            }
        }
        // dd($hinhcu);
            
        $product= Myproduct::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->id_user = Auth::id();
        $product->id_category = $request->category;
        $product->id_brand = $request->brand;
        $product->status = $request->status;
        $product->sale = !empty($request->status == 1) ? "" : $request->sale;
        $product->company = $request->company;  
        $product->avatar = !empty($xx) ? json_encode($allImg) : json_encode($hinhcuok);
        $product->detail= $request->detail;
        $product->save();
        return redirect('account/myproduct')->with('success', 'sp up thanh cong');
        

        
        
        
    }
    public function handleFile($file){
            
            $id_user = Auth::id();
            foreach($file as $image)
            {
            
                $codeimg = strtotime(date('Y-m-d H:i:s'));
                $name = "hinh85_".$codeimg."_".$image->getClientOriginalName();
                $name_2 = "hinh329_".$codeimg."_".$image->getClientOriginalName();
                $name_3 = "hinhfull_".$codeimg."_".$image->getClientOriginalName();

                $folder = 'upload/frontend/product/'.$id_user;
                if (is_dir($folder) != true ) {
                    mkdir($folder, 0777, true); 
                }
                $path = public_path($folder.'/'. $name);
                $path2 = public_path($folder.'/'. $name_2);
                $path3 = public_path($folder.'/'. $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                Image::make($image->getRealPath())->resize(329, 380)->save($path3);
                
                $data[] = $name;

                

            }

            return $data;
        
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        Myproduct::where('id',$id)->delete();
        return redirect('account/myproduct')->with('success',('Delete product success.'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productdetail($id)
    {
        $productdetail = Myproduct::where('id',$id)->get();
        return view ('frontend.account.productdetail', compact('productdetail'));
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
