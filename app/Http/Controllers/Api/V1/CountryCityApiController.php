<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\City;
use App\Models\Country;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CountryCityApiController extends Controller
{
  public function ShowCity(Request $request , $country ) {
   // dd($country );
        $cities=City::where('country_id',$country)->paginate(15);
        //dd($city);
        /* $cities = City::paginate(1); */
        if ($cities) {
        // dd($resturants->toArray());
        return ResponseHelper::success($cities->items(), 'Cities retrieved successfully.', 200, $cities);
        } else {
        return ResponseHelper::error('Cities not found.', 404);
        }
    }


  public function ShowCountry() {
        $country = Country::paginate(1);
        if ($country) {
        // dd($resturants->toArray());
        return ResponseHelper::success($country->items(), 'Countries retrieved successfully.', 200, $country);
        } else {
        return ResponseHelper::error('Countries not found.', 404);
        }
    }
}
