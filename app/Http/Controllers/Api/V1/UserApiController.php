<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdditionalRequest;
use App\Http\Requests\UpdateAdditionalRequest;
use App\Http\Resources\Admin\AdditionalResource;
use App\Models\Additional;
use App\Models\Resturant;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserApiController extends Controller
{



    public function register(Request $request)
    {
        // create New User Type/ Role Client
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::error('Validation failed.', 422, $validator->errors());
        }

        // Create the user
        $user = User::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'name' => $request->input('name'),
        ]);

        $user->roles()->sync([3]);
        return ResponseHelper::success($user, 'User registered successfully.');
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

        return response()->json(['message' => 'Unauthorized'], 401);
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
}
