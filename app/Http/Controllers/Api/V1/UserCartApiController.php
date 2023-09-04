<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Product;
use App\Models\UserCart;
use App\Models\Resturant;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreUserCartsRequest;

class UserCartApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user_id=Auth()->user()->id;
        $user=User::find($user_id);
        $cart= Usercart::with('product' ,'resturant')->where('user_id' , $user_id) ->get()->toArray();
        return ResponseHelper::success( $cart, 'user carts retrieved successfully.', 200,);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $user_id=Auth()->user()->id;
       $validator = \Validator::make($request->all(), [

            'product_id' => 'required',
            'amount'=>'required'

       ]);


       if ($validator->fails()) {
            return ResponseHelper::error('Validation failed.', 422, $validator->errors());
       }
       $product_id=$request->input('product_id');


       //check if is the cart Exist or not
       if(UserCart::where('product_id',$product_id)->where('user_id',$user_id)->exists()){
            $user_cart= UserCart::where('product_id',$product_id)->where('user_id',$user_id);
            $product_price=Product::find($product_id)->price;
            $amount=$request->amount;
            $total_price=$amount*$product_price;
            $user_cart=$user_cart->update([
                'amount' => $amount,
                'total_price'=>$total_price
            ]);
            $data= UserCart::where('product_id',$product_id)->where('user_id',$user_id)->get();
            return ResponseHelper::success( $data, 'user cart updated successfully.', 200,);
       }else{
            $amount=$request->input('amount');
            $product_price=Product::find($product_id)->price;
            $resturant_id=Product::find($product_id)->resturant->id;
            $total_price=$amount*$product_price;

            $user_cart=UserCart::create([
                'amount'        =>  $request->amount,
                'total_price'   =>  $total_price,
                'user_id'       =>  $user_id,
                'product_id'    =>  $product_id,
                'resturant_id'  =>  $resturant_id,
            ]);
            if($user_cart){
                return ResponseHelper::success( $user_cart, 'user cart added successfully.', 200,);
            }else{
                return ResponseHelper::error('Something went wrong', 422, );
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cart= Usercart::with('product' ,'resturant')->where('id',$id)->get();
        return ResponseHelper::success( ['cart'=>$cart], 'user carts retrieved successfully.', 200,);

    }

    /**
     * Update the specified resource in storage.
     */
    /* public function update(Request $request, string $id)
    {
        //
    } */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart=UserCart::find($id);
        $cart->delete();
        return ResponseHelper::success('user cart deleted successfully.', 200,);
    }
}
