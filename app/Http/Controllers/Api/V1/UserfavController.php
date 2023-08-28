<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddMyFavoriteRequest;

class UserfavApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $user = auth()->user()->id; */
        $fav=Favorite::with(['user', 'product'])->paginate(5);
        return ResponseHelper::success($fav->items(), 'data retrieved successfully.', 200, $fav);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [

        'product_id' => 'required',

        ]);


        if ($validator->fails()) {
            return ResponseHelper::error('Validation failed.', 422, $validator->errors());
        }
        //check if the product is in user favorite or not
        $product_id=$request->input('product_id');
        $user_id=auth()->user()->id;
        $fav=Favorite::where('product_id',$product_id)->where('user_id',$user_id)->get()->toArray();
        /* dd($fav); */
        if($fav==[]){

            $user_fav = Favorite::create([
            'product_id'=>$product_id,
            'user_id'=>$user_id,
            ]);

            // dd($resturants->toArray());
            return ResponseHelper::success( $user_fav, 'user favorite added successfully.', 200,);
        }else{
            return ResponseHelper::error('product is already in user favorite', 422);
        }


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
    /* public function update(Request $request, string $id)
    {
        //
    } */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

            $favorite=Favorite::find($id);
            if($favorite==null){
                return ResponseHelper::error( 'not found.', 422,);
            }
            $favorite->delete();
            return ResponseHelper::success( 'user favorite deleted successfully.', 200,);

    }

}
