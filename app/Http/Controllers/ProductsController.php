<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Cart;

use App\Models\User;

use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_category' => 'required',
            'product_price' => 'required',
            'product_desc' => 'required',
        ]);
        $status='Available';
        $todo = Product::create([
            'name' => $request->input('product_name'),
            'category' => $request->input('product_category'),
            'image' => $request->input('product_image'),
            'price' => $request->input('product_price'),
            'description' => $request->input('product_desc'),
            'status' => $status,
            ]);
        return redirect()->route('Manage-Product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public $data;
    public function adminProductShow()
    {
        $this->data =  Product::paginate(5);
        return view('admin.products.product_view',['data'=>$this->data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $id)
    {
        return view('admin.products.product_add',['data'=>$id]);
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
        $data = $request->input();
        Product::where('id',$id)->update(['name'=>$data['product_name'],'category'=>$data['product_category'],'image'=>$data['product_image'],'price'=>$data['product_price'],'description'=>$data['product_desc'],'status'=>$data['product_status']]);
        return redirect()->route('Manage-Product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back();
    }

    public function updateStatus(Request $request){
        $data = $request->input();
        Product::where('id',$data['product_id'])->update(['status'=>$data['product_status']]);
    }

    public function sortProduct(Request $request,$category)
    {
        $data = $request->input();
        $this->data = Product::where('category',$category)->paginate(5);
        return view('admin.products.product_view',['data'=>$this->data]);
    }

    public function userProductShow(Product $id)
    {
        return view('user.products.product_view',['data'=>$id]);
    }

    public function addToCart(Request $request)
    {
        $data = $request->input();

        Cart::create([
            'product_id' => $data['product_id'],
            'user_id' => session()->get('user_id'),
            ]);
    }

    public function userCartShow()
    {
        //$data = Cart::where('user_id',session('user_id'))->distinct()->get();
        $data = DB::table('carts')
            ->where('user_id',session()->get('user_id'))
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->get();
        $total = DB::table('carts')
        ->where('user_id',session()->get('user_id'))
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->sum('products.price');
        return view('user.order.manage_cart',['data'=>$data,'total_price'=>$total]);
    }

    public function deleteFromCart(Request $request)
    {
        $data = $request->input();
        Cart::where('product_id',$data['product_id'])
            ->where('user_id',session()->get('user_id'))
            ->delete();
    }

    public function findProduct(Request $request)
    {
        $findingdata = $request->input('searchproduct');
        dd($findingdata);
        $product = Product::where('name','LIKE',"%" .$findingdata ."%")
                    ->orWhere('id',$findingdata)
                    ->get();
        return view('user.user_dashboard',['data'=>$product]);
    }
}
