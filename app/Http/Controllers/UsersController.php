<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'user_contactnumber' => 'required|min:10|max:10',
            'user_address' => 'required',
            'user_password' => 'required|max:8',
        ]);

        User::create([
            'name' => $request['user_name'],
            'email' => $request['user_email'],
            'contactnumber' => $request['user_contactnumber'],
            'address' => $request['user_address'],
            'password' => Hash::make($request['user_password']),
            'status' => '1',
        ]);

        return redirect('/signin');
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
    public function show()
    {
        return view('user.user_dashboard',['data'=>Product::where('status','Available')->get()]);
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
    public $id;
    public function checkAuthUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:8',
        ]);

        $credential = $request->only('email','password');
         
        if(Auth::attempt($credential))
        {
            $request->session()->regenerate();
            $request->session()->put('user_email',$credential['email']);
            //dd($request->session()->get('user_email')); 
            return redirect('/');
        }
        else
        {
            return back()->with('error', 'The provided credentials do not match our records.');
        }
    }

    public function signOut(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }

        public function updateStatus(Request $request){
            $data = $request->input();
            User::where('id',$data['user_id'])->update(['status'=>$data['user_status']]);
        }
}
