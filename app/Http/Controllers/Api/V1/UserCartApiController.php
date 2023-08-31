<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\UserCart;
use App\Models\Resturant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCartApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id=Auth()->user()->id;
        $user=User::find($user_id);
        $cart=$user->usercart();
        $resturant_id=$user->usercart()->get('resturant_id');
        $resturant=Resturant::find($resturant_id);


        /*$cart=UserCart::where('user_id',$user_id);
         dd($cart);
        $resturant=$cart->resturant;*/
        dd($resturant);


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
