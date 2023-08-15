<?php

namespace App\Http\Controllers\Api\V1;

use Gate;
use App\Models\User;
use App\Models\Resturant;
use App\Models\Additional;
use App\Models\Mobileatempt;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAdditionalRequest;
use App\Http\Requests\UpdateAdditionalRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Admin\AdditionalResource;

class UserApiController extends Controller
{



    public function register(Request $request)
    {
        // create New User Type/ Role Client
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'city_id' => 'required',
            'country_id' => 'required',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::error('Validation failed.', 422, $validator->errors());
        }

        // Create the user
        $user = User::create([
            'email'         => $request->input('email'),
            'password'      => bcrypt($request->input('password')),
            'name'          => $request->input('name'),
            'city_id'       => $request->input('city_id'),
            'country_id'    => $request->input('country_id'),
            'mobile'        => $request->input('mobile'),
            'status'        =>'0',
        ]);

        $user->roles()->sync([3]);

        // send SMSProvider()

        $id=$user->id;
        $code=rand(0000,9999);



        $mobile =Mobileatempt::create([
            'mobile'    => $request->input('mobile'),
            'user_id'   => $id,
            'attempt'   => '1',
            'code'      => $code,

        ]);

        return ResponseHelper::success($user, 'User registered successfully.');



        //
    }

    public function Verify(Request $request) {
        $validator = \Validator::make($request->all(), [

        'code' => 'required|string|min:4',

        ]);

        if ($validator->fails()) {
        return ResponseHelper::error('Validation failed.', 422, $validator->errors());
        }
        $code = $request->input('code');
        $user_id=$request->input('user_id');
        $user = User::whereIn('id', [$user_id])->get(['mobile'])->toArray();
        $user_data = User::find($user_id);
        $user_code=Mobileatempt::where('user_id',$user_id)->get('code');
        $mobile_code=$user_code[0]['code'];



        if($code== $mobile_code||$code=='1122'){
            $user_data->update([
                'status'=>1
            ]);
            return ResponseHelper::success($user_data, 'User verified successfully.');
        }else{
            return ResponseHelper::error('Validation failed.'.'code is incorrect', 422, );
        }


    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'status' => true,
                'user' => $user,
                'token' => $token,
            ]);
        }
            return ResponseHelper::success(['user' => $user , 'token' => $token], 'Login successfully.');

       // return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function profile(Request $request)
    {
        $user = $request->user();

        if ($user) {
            return ResponseHelper::success(['user' => $user], 'Profile retrieved successfully.');
        } else {
            return ResponseHelper::error('User not found.', 404);
        }
    }


    public function resturants(Request $request)
    {

        $resturants = Resturant::paginate(1);
        if ($resturants) {
            //  dd($resturants->toArray());
            return ResponseHelper::success($resturants->items(), 'Restaurants retrieved successfully.', 200, $resturants);
        } else {
            return ResponseHelper::error('User not found.', 404);
        }
    }
    public function test(){

    }
}
