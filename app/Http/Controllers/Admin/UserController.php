<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Auth;




class UserController extends Controller
{
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id = Auth::id();
        // // $name = Auth::user();
        // echo $name;
        // exit;
        // $country = Country::where('id',$id)->get();
        // dd($country);
        // echo 1;
        // exit;

        // Country::all();
        $table = Country::all();
        
        return view('admin.user.pages-profile', compact('table'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateprofile(ProfileRequest $request)
    {
        $userId = Auth::id();
        
        $user = User::findOrFail($userId); // lay mang theo id trong bang tren database
        $data = $request->all(); // lay du lieu trong bang sau khi chinh sua
        $file = $request->avatar;
        // var_dump($data);
        // exit;


        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
         
        }
        
        // $anh = $data['avatar'];
        
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }
        // echo 'duoi file: ' . $file ->getClientOriginalExtension();
        // dd($file);
        // if ($request->hasFile('avatar')) {
        //     $file = $request->avatar;

        // }

        if ($user ->update($data)) {
            if (!empty($file)) {
                $file->move('admin/assets/images/users',$file->getClientOriginalName());
                // echo $file;
                // exit;
            }
            return redirect()->back()->with('success',('Update profile success.'));
        }else{
            return redirect()->back()->withErrors('Update profile error.');
        }

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
