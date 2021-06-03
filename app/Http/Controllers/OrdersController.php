<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\DB;

use App\Models\Cart;

use function PHPUnit\Framework\isEmpty;

class OrdersController extends Controller
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
        $data = $request->input();

        $cart = Cart::where('product_id',$data['product_id'])
        ->where('user_id',session()->get('user_id'));

        $user_data = User::where('id',session()->get('user_id'))->first();
        if($cart)
        {
            Order::create([
                'product_id' => $data['product_id'],
                'user_id' => session()->get('user_id'),
            ]);
            $cart->delete();
            event(new OrderPlaced($user_data));
        }
        else
        {
            Order::create([
                'product_id' => $data['product_id'],
                'user_id' => session()->get('user_id'),
            ]);
        }
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
            $data = DB::table('orders')
                ->where('user_id',session()->get('user_id'))
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->get();

            return view('user.order.order_view',['data'=>$data]);
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
