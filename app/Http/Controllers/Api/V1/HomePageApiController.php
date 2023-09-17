<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ADS;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;

class HomePageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider=ADS::where('type','slider')->get();
        $ads=ADS::where('type','ADS')->get();
        $bestseller=Product::orderby('order_count','desc')->limit(10)->get();
        $data=[
            'slider'=>$slider,
            'ads'=>$ads,
            'bestseller'=>$bestseller,
        ];
        // dd($resturants->toArray());
        return ResponseHelper::success( $data, 'data retrieved successfully.', 200,);

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
