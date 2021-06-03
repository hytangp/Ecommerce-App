<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

use App\Models\User;

use App\Models\Category;

class AdminsController extends Controller
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
    public function create()
    {
        //
    }

    public function adminAddProductView()
    {
        $category = Category::all();
        return view('admin.products.product_add',['category'=>$category]);
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
        return view('admin.admin_dashboard',['productdata'=>Product::count(),'orderdata'=>Order::count(),'userdata'=>User::count(),'activeusers'=>User::where('status',1)->count(),'inactiveusers'=>User::where('status',0)->count()]);
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

    public function checkAuthAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:8',
        ]);

        $credentials = $request->only('email','password');

        // dd(Auth::guard('admin')->attempt($credentials));
        
        if(Auth::guard('admin')->attempt($credentials))
        {
            $request->session()->regenerate();
    
            return redirect('/admin');  
        }
        else
        {
            return redirect()->back()->with('error','The credentials provided doesn\'t match.');
        }

    } 
    
    public function signOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }

    public $data;
    public function adminUserShow()
    {
        $this->data =  User::paginate(5);
        return view('admin.users.user_view',['data'=>$this->data]);
    }
}
