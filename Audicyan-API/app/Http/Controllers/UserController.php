<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function CreateUser(request $user){
        $newUser = new User;

        $newUser->name = $user->name;
        $newUser->password = $user->password;
        $newUser->email = $user->email;
        $newUser->city = $user->city;
        $newUser->birthday = $user->birthday;
        $newUser->picture = $user->picture;
        $newUser->experience = $user->experience;
        
        $newUser->save();
        return response()->json($newUser);
    }

    public function ShowUser($id){
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    public function ListUsers(){
        $users = User::all();
        return response()->json($users);
    }

    public function DeleteUser($id){
        User::destroy($id);
        return response('usuario deletado!');
    }

    public function UpdateUser(request $newUserData, $id){

        $userData = User::findOrFail($id);

        if($newUserData){
            if($newUserData->name){
                $userData->name = $newUserData->name;
            }
            if($newUserData->email){
                $userData->email = $newUserData->email;
            }
            if($newUserData->city){
                $userData->city = $newUserData->city;
            }
            if($newUserData->birthday){
                $userData->birthday = $newUserData->birthday;
            }
            if($newUserData->experience){
                $userData->experience = $newUserData->experience;
            }
        }
        
        $userData->save();

        return response()->json($userData);
    }
}