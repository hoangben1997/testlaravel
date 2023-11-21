<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;

use App\Models\Blog;
use App\Models\Blograte;
use App\Models\Blogcmt;

use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        // $iduser = Auth::id();
        // dd($iduser);
        $table = Blog::orderBy('created_at', 'desc')->paginate(3);
        $rate = Blograte::all();
        
        return response()->json([
            'blog' => $table
        ]);
        // return view('frontend.blog.blog',compact('table','rate'));
    }

    public function blogRate(Request $request)
    {
        // dd($_POST['values']);
        $data = $request->all();

        if (!empty($data['id_user'])) {
            $blograte = Blograte::updateOrCreate(
            ['id_blog' => $data['id_blog'], 'id_user' => $data['id_user']],
            ['rate' => $data['values']]
        );
        }
        
        
    }

    public function blogCmt(Request $request, $id)
    {
        // echo 1;
        // exit;
        // $data = $request->all();
       
        // dd($_POST['message']);
        $id_user = Auth::id();
        
        if (!empty($id_user)) {
            $id_blog = $id;
            $name = Auth::user()->name;
            $avatar = Auth::user()->avatar;

            $blogcomment =new Blogcmt();
            $blogcomment->name = $name;
            $blogcomment->id_blog = $id_blog;
            $blogcomment->id_user = $id_user;
            $blogcomment->comment = !empty($_POST['message']) ? $_POST['message'] : $_POST['comment'];
            $blogcomment->avatar = $avatar;
            $blogcomment->level = !empty($_POST['level']) ? $_POST['level'] : 0;
            $blogcomment-> save();
            
        }
        return back();

    }

    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blogsingle($id)
    {
        $viewrate = Blograte::where('id_blog',$id)->get()->toArray(); // tong luot nguoi danh gia
        $count = count($viewrate);

        $sum = 0;
        foreach($viewrate as $key => $value){
            $rate = $value['rate'];
            $sum = $sum + $rate;
        }
        $giatritrungbinh = $sum/$count;
        // lam tron chu so thap phan
        $rateTB = round($giatritrungbinh, 0);

        $blogcomment = Blogcmt::where('id_blog',$id)->get();
        $countcmt = count($blogcomment);


        $table = Blog::where('id',$id)->get();
        
        // get the current user
        $blogid = Blog::find($id);

        // get previous user id
        $previous = Blog::where('id', '<', $blogid->id)->max('id');
        // dd($previous);
        // get next user id
        $next = Blog::where('id', '>', $blogid->id)->min('id');
        // $trang = Blog::paginate(1);
        return view('frontend.blog.blogsingle',compact('table','previous','next','count','rateTB','blogcomment','countcmt'));
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
