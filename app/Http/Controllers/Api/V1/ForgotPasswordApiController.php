<?php

namespace App\Http\Controllers\api\V1;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ForgotPasswordApiController extends Controller
{
    public function forgot(Request $request) {
        /* $credentials = request()->validate(['email' => 'required|email']); */
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return ResponseHelper::error('Validation failed.', 422,$validator->errors());
        }
        $email_input = $request->input('email');
        $user_email  = User::where('email',$email_input)->get()->toArray();
        /* dd($user_email); */
        if($user_email==[]){
                return response()->json(["msg" => 'email is not registered.']);
        }
        $credentials=['email'=>$email_input];
        Password::sendResetLink($credentials);
        return response()->json(["msg" => 'Reset password link sent on your email id.']);


    }

    public function reset() {
        $credentials = request()->validate([
        'email' => 'required|email',
        'token' => 'required|string',
        'password' => 'required|string|confirmed'
        ]);

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
        $user->password = $password;
        $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
        return response()->json(["msg" => "Invalid token provided"], 400);
        }

        return response()->json(["msg" => "Password has been successfully changed"]);
    }
}
