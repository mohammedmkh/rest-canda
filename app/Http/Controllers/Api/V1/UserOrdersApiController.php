<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
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

    public function orderdetails(String $id) {
        $product=OrderProduct::where('order_id',$id)->get();
        dd($product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
