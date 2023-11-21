public function store(Request $request)
{               
        //Kiểm tra giá trị tenhocsinh, sodienthoai, khoi
        $this->validate($request, 
                [
                        //Kiểm tra giá trị rỗng
                        'tenhocsinh' => 'required',
                        'sodienthoai' => 'required',
                        'khoi' => 'required',
                ],                      
                [
                        //Tùy chỉnh hiển thị thông báo
                        'tenhocsinh.required' => 'Bạn chưa nhập tên học sinh!',
                        'sodienthoai.required' => 'Bạn chưa nhập số điện thoại!',
                        'khoi.required' => 'Bạn chưa chọn khối!',
                ]
        );
        
        //Lưu hình thẻ khi có file hình
        $gethinhthe = '';
        if($request->hasFile('hinhthe')){
                //Hàm kiểm tra dữ liệu
                $this->validate($request, 
                        [
                                //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                                'hinhthe' => 'mimes:jpg,jpeg,png,gif|max:2048',
                        ],                      
                        [
                                //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                                'hinhthe.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                                'hinhthe.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                        ]
                );
                
                //Lưu hình ảnh vào thư mục public/upload/hinhthe
                $hinhthe = $request->file('hinhthe');
                $gethinhthe = time().'_'.$hinhthe->getClientOriginalName();
                $destinationPath = public_path('upload/hinhthe');
                $hinhthe->move($destinationPath, $gethinhthe);
        }
        
        //Lưu file lý lịch khi có file
        $getlylich = '';
        if($request->hasFile('lylich')){
                $this->validate($request, 
                        [
                                //Kiểm tra đúng file đuôi .doc hay .docx và dung lượng không quá 5M
                                'lylich' => 'mimes:doc,docx|max:5120',
                        ],                      
                        [
                                //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                                'lylich.mimes' => 'Chỉ chấp nhận lý lịch với đuôi .doc .docx',
                                'lylich.max' => 'Lý lịch giới hạn dung lượng không quá 5M',
                        ]
                );
                
                //Lưu file vào thư mục public/upload/lylich
                $lylich = $request->file('lylich');
                $getlylich = time().'_'.$lylich->getClientOriginalName();
                $destinationPath = public_path('/upload/lylich');
                $lylich->move($destinationPath, $getlylich); 
        }
        
        //Lấy giá trị học sinh đã nhập
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $allRequest  = $request->all();
        $tenhocsinh  = $allRequest['tenhocsinh'];
        $sodienthoai = $allRequest['sodienthoai'];
        $khoi = $allRequest['khoi'];
        
        //Gán giá trị vào array
        $dataInsertToDatabase = array(
                'tenhocsinh'  => $tenhocsinh,
                'sodienthoai' => $sodienthoai,
                'hinhthe' => $gethinhthe,
                'lylich' => $getlylich,
                'khoi' => $khoi,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        );
        
        //Insert vào bảng tbl_hocsinh
        $insertData = DB::table('tbl_hocsinh')->insert($dataInsertToDatabase);
        if ($insertData) {
                Session::flash('success', 'Thêm mới học sinh thành công!');
        }else {                        
                Session::flash('error', 'Thêm thất bại!');
        }
        
        //Thực hiện chuyển trang
        return redirect('hocsinh/create');
}