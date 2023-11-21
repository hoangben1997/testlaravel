<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HocsinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lấy danh sách học sinh từ database
        $getData = DB::table('tbl_hocsinh')->select('id','tenhocsinh','sodienthoai')->get();
        
        //Gọi đến file list.blade.php trong thư mục "resources/views/hocsinh" với giá trị gửi đi tên listhocsinh = $getData
        return view('hocsinh.list')->with('listhocsinh',$getData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('hocsinh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Them moi hoc sinh
        //Set timezone
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        
        //Lấy giá trị học sinh đã nhập
        $allRequest  = $request->all();
        $tenhocsinh  = $allRequest['tenhocsinh'];
        $sodienthoai = $allRequest['sodienthoai'];
        
        //Gán giá trị vào array
        $dataInsertToDatabase = array(
            'tenhocsinh'  => $tenhocsinh,
            'sodienthoai' => $sodienthoai,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        
        //Insert vào bảng tbl_hocsinh
        $insertData = DB::table('tbl_hocsinh')->insert($dataInsertToDatabase);
        
        //Kiểm tra Insert để trả về một thông báo
        if ($insertData) {
            Session::flash('success', 'Thêm mới học sinh thành công!');
        }else {                        
            Session::flash('error', 'Thêm thất bại!');
        }
        
        //Thực hiện chuyển trang
        return redirect('hocsinh/create');
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
        //Lấy dữ liệu từ Database với các trường được lấy và với điều kiện id = $id
        $getData = DB::table('tbl_hocsinh')->select('id','tenhocsinh','sodienthoai')->where('id',$id)->get();
        
        //Gọi đến file edit.blade.php trong thư mục "resources/views/hocsinh" với giá trị gửi đi tên getHocSinhById = $getData
        return view('hocsinh.edit')->with('getHocSinhById',$getData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Cap nhat sua hoc sinh
        //Set timezone
        date_default_timezone_set("Asia/Ho_Chi_Minh");  
     
        //Thực hiện câu lệnh update với các giá trị $request trả về
        $updateData = DB::table('tbl_hocsinh')->where('id', $request->id)->update([
            'tenhocsinh' => $request->tenhocsinh,
            'sodienthoai' => $request->sodienthoai,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        //Kiểm tra lệnh update để trả về một thông báo
        if ($updateData) {
            Session::flash('success', 'Sửa học sinh thành công!');
        }else {                        
            Session::flash('error', 'Sửa thất bại!');
        }
        
        //Thực hiện chuyển trang
        return redirect('hocsinh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Xoa hoc sinh
        //Thực hiện câu lệnh xóa với giá trị id = $id trả về
        $deleteData = DB::table('tbl_hocsinh')->where('id', '=', $id)->delete();
        
        //Kiểm tra lệnh delete để trả về một thông báo
        if ($deleteData) {
            Session::flash('success', 'Xóa học sinh thành công!');
        }else {                        
            Session::flash('error', 'Xóa thất bại!');
        }
        
        //Thực hiện chuyển trang
        return redirect('hocsinh');
    }
}
