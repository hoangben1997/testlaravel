<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Auth;
class BlogadminController extends Controller
{

    
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexblog()
    {
        
        $table = Blog::paginate(3);
        //$phantrang = Blog::paginate(3);
        return view('admin.blog.indexblog',compact('table'));


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nhapblog()
    {
        return view('admin.blog.addblog');
    }

    /**
     * Display the specified resource.
     *
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addblog(BlogRequest $request)
    {
        $file = $request->image;
        if (!empty($file)) {
            $file->move('admin/assets/images/users',$file->getClientOriginalName());

            $table =new Blog();
            // dd($table);
            // exit;
            $table -> title = $_POST['title'];
            $table -> image = $file->getClientOriginalName();
            $table -> description = $_POST['description'];
            $table -> content = $_POST['content'];
            $table -> save();
            return redirect('admin/blogadmin')->with('success',('Add blog success.'));
            
        }else{
            return redirect()->back()->withErrors('add blog error.');
        }

        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showblog($id)
    {
        $table = Blog::where('id',$id)->get();
        return view('admin.blog.editblog',compact('table'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateblog(BlogRequest $request)
    {
        
        
        $id = $request->id; 
        $blog = Blog::findOrFail($id);// lay mang theo id trong bang tren database
        $data = $request->all(); // lay du lieu trong bang sau khi chinh sua
        $file = $request->image;
        // var_dump($data);
        // exit;

        // dd($id);
        if (!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
         
        }
        

        if ($blog ->update($data)) {
            if (!empty($file)) {
                $file->move('admin/assets/images/users',$file->getClientOriginalName());
                // echo $file;
                // exit;
            }
            return redirect('admin/blogadmin')->with('success',('Update blog success.'));
        }else{
            return redirect()->back()->withErrors('Update blog error.');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteblog($id)
    {
        
        Blog::where('id',$id)->delete();
        return redirect('admin/blogadmin')->with('success',('Delete blog success.'));  
        
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
