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

    //User instrument relationship functions
    public function GetUserInstruments($id){
        $user = User::findOrFail($id);
        
        $instruments = $user->instruments()->get();
        return response()->json($instruments);
    }

    public function InstertUserInstrument($user_id, $instruments_id){
        $user = User::findOrFail($user_id);
        $user->instruments()->attach($instruments_id);

        return response()->json($user->instruments()->get());
    }

    public function EraseUserInstrument($user_id, $instruments_id){
        $user = User::findOrFail($user_id);
        $user->instruments()->detach($instruments_id);

        return response()->json($user->instruments()->get());
    }

    //User skill relationship functions
    public function GetUserSkills($id){
        $user = User::findOrFail($id);
        
        $skills = $user->skills()->get();
        return response()->json($skills);
    }

    public function InstertUserSkill($user_id, $skill_id){
        $user = User::findOrFail($user_id);
        $user->skills()->attach($skill_id);

        return response()->json($user->skills()->get());
    }

    public function EraseUserSkill($user_id, $skill_id){
        $user = User::findOrFail($user_id);
        $user->skills()->detach($skill_id);

        return response()->json($user->skills()->get());
    }

    //User material relationship functions
    public function InstertUserMaterial($user_id, request $requestData){
        $user = User::findOrFail($user_id);
        $materialData = [ 'url' => $requestData->url];
        $user->materials()->create($materialData);

        return response()->json($user->materials()->get());
    }

    public function GetUserMaterials($user_id){
       $user = User::findOrFail($user_id);
       
       return response()->json($user->materials()->get());
    }

    public function EraseUserMaterial($user_id, $material_id){
        $user = User::findOrFail($user_id);
        $user->materials()->where('id', '=', $material_id)->delete();
        
        return response()->json($user->materials()->get());
    }

    //matchs functions ( user-> user relationship )
    public function GetUserMatchs($id){
        $user = User::findOrFail($id);
        
        $matchs = $user->matchs()->get();
        return response()->json($matchs);
    }

    public function InstertUserMatch($user_id, $other_user_id){
        $user = User::findOrFail($user_id);
        $user->matchs()->attach($other_user_id);

        return response()->json($user->matchs()->get());
    }

    public function EraseUserMatch($user_id, $other_user_id){
        $user = User::findOrFail($user_id);
        $user->matchs()->detach($other_user_id);

        return response()->json($user->matchs()->get());
    }
}
