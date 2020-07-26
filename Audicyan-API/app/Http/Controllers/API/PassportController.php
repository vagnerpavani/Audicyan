<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use DB;



class PassportController extends Controller
{
    public $successStatus = 200;

    public function Register(Request $userData) {
        $validator = Validator::make($userData -> all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator -> fails()) {
            return response() -> json(['error' => $validator->errors()], 401);
        }

        $newUser = new User;

        $newUser->name = $userData->name;
        $newUser->password = bcrypt($userData->password);
        $newUser->email = $userData->email;
        $newUser->city = $userData->city;
        $newUser->birthday = $userData->birthday;
        $newUser->picture = $userData->picture;
        $newUser->experience = $userData->experience;
        
        $newUser->save();

        $success['token'] = $newUser->createToken('MyApp')->accessToken;
        $success['name'] = $newUser->name;  
        return response() -> json(['success' => $success], $this->successStatus);
    }
    
    
    public function Login(){
        if (Auth::attempt(['email'=>request('email'), 'password'=>request('password')])){
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response() -> json(['success' => $success, 'user' => $user->id], $this->successStatus);
        }
        else {
            return response() -> json (['error' => 'Unauthorised'], 401);
        }
    }

    public function logout(){
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();
        return response()->json( null, 204);
    }
}
