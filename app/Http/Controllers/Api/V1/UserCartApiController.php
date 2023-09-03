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
use App\Http\Requests\StoreUserCartRequest;

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
    public function store(StoreUserCartRequest $request)
    {
        
        $product_id=$request->input('product_id');
        $product_price=Product::find($product_id)->get('price');
        dd($product_price);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
        //
    }
}
