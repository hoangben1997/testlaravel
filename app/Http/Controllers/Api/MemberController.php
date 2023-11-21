<?php


namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\RegisterRequest;
// use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('frontend.member.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateregister(RegisterRequest $request)
    {
        
        $data = $request->all();
        $file = $request->avatar;
        
        // dd($file);

        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
            $file->move('admin/assets/images/users',$file->getClientOriginalName());
        }
        
        $table =new User();
        $table->name = $_POST['name'];
        $table->email = $_POST['email'];
        $table->password = bcrypt($_POST['password']);
        $table->phone = $_POST['phone'];
        $table->avatar = $data['avatar'];
        $table->level =0;
        $table-> save();
        return redirect('/registermember')->with('success',('Register user success.'));
        
        
        // return redirect()->route('/register')->with('success',('Register user success.'));
        
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
         return view('frontend.member.login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logincheck(Request $request)
    {
        // echo 111;
        // exit;
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];
        // var_dump($login);
        // exit;
        $remember = false;
        if ($request->remember_me) {
            $remember = true;
        }
        
        if (Auth::attempt($login, $remember)) {
            
            // return redirect('/account/update')->with('success',('Login user success.'));
            return response()->json([
                    // 'response' => 'success',
                    // 'success' => $success, 
                    'Auth' => $login
                ], 
                // $this->successStatus
            ); 

            
        }else{
            // echo 1;
            // exit;
            return redirect()->back()->withErrors('Login user error.');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/homeindex');
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
