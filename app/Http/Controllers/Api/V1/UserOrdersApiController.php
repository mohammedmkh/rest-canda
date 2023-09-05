<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;

class UserOrdersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        $orders = $user->userOrders()->get();
         if ($orders) {
                return ResponseHelper::success(['orders' => $orders], 'orders retrieved successfully.', 200);
             } else {
                return ResponseHelper::error('orders not found.', 404);
             }
         /* dd($OrderIds); */
    }

    public function orderdetails(string $id) {


        $products= OrderProduct::with('order','product')->where('id',$id);
        /* dd($products); */
        if ($products->exists()) {

            $orders=OrderProduct::find($id);
            $product=$orders->product;
            $resturant=$orders->product->resturant;

            /* dd($resturant); */
            return ResponseHelper::success([
                'order'     =>  $orders,
            ],200);


        } else {

            return ResponseHelper::error(' not found.', 404);

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id=auth()->user()->id;
        $validator = \Validator::make($request->all(), [
        'delivery_price' => 'required',
        'receipt_type'=>'required',
        'tax'=>'required',
        'payment_method_id'=>'required',
        'quantity'=>'required',
        'product_id'=>'required',

        ]);


        if ($validator->fails()) {
            return ResponseHelper::error('Validation failed.', 422, $validator->errors());
        }
        $product_id =$request->input('product_id');
        $product=Product::find($product_id);



        $quantity =$request->input('tax');

        $tax =$request->input('tax');

        $delivery_price =$request->input('delivery_price');

        $product_price=$product->price;

        $resturant_id=$product->resturant_id;

        $total_prodcut_price=$quantity*$product_price;

        $total_order_price=$total_prodcut_price+$tax+$delivery_price;

        $order = new Order([
            'total' =>$total_order_price,
            'order_status'      =>  'pending',
            'receipt_type'      =>  $request->input('receipt_type'),
            'tax'               =>  $tax,
            'user_id'           =>  $user_id,
            'resturant_id'      =>  $resturant_id,
            'payment_method_id' =>  $request->input('payment_method_id'),
            'delivery_price'    =>  $delivery_price
        ]);

        $order->save();

        $orderItem = new OrderProduct([
            'price'         => $product_price,
            'quantity'      => $quantity,
            'total'         => $total_prodcut_price,
            'product_id'    => $product_id,
        ]);

        $order->orderOrderProducts()->save($orderItem);

        return ResponseHelper::success(['message' => 'Order placed successfully'],200);


    }

    /**
     * Display the specified resource.
     */
    /* public function show(string $id)
    {
        //
    } */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $order=Order::find($id);
        $order->delete();
        $order->orderOrderProducts()->delete();
    }
}
