<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Requests\AccountRequest;
use Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {

        return view ('frontend.account.account');
    }



    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateaccount(AccountRequest $request)
    {
        // echo 1;
        // exit;
        $userId = Auth::id();
        // dd($userId);
        $user = User::findOrFail($userId); // lay mang theo id trong bang tren database
        $data = $request->all(); // lay du lieu trong bang sau khi chinh sua
        $file = $request->avatar;
        
        // dd($user);
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        // dd($data['images']);
        }
        
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }
        
        if ($user->update($data)) {
            if (!empty($file)) {
                $file->move('admin/assets/images/users',$file->getClientOriginalName());
                // echo $file;
                // exit;
               
            }
            return redirect()->back()->with('success',('Update user success.'));
        }else{
            return redirect()->back()->withErrors('Update user error.');
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
