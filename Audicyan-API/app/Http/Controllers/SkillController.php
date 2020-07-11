<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;

class SkillController extends Controller
{
    public function CreateSkill(request $skill){
        $newSkill = new Skill;

        $newSkill->name = $skill->name;
        
        $newSkill->save();
        return response()->json($newSkill);
    }

    public function ShowSkill($id){
        $skill = Skill::findOrFail($id);

        return response()->json($skill);
    }

    public function ListSkill(){
        $skills = Skill::all();
        return response()->json($skills);
    }

    public function DeleteSkill($id){
        Skill::destroy($id);
        return response('habilidade deletada!');
    }

    public function UpdateSkill(request  $newSkillData, $id){

        $skillData = Skill::findOrFail($id);

        if($newSkillData){
            if($newSkillData->name){
                $skillData->name = $newSkillData->name;
            }
        }
        $skillData->save();
        return response()->json($skillData);
    }
}
