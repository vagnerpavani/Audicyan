<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;

class MaterialController extends Controller
{
    public function CreateMaterial(request $Materials){
        $newMaterials = new Material;

        $newMaterials->url = $Materials->url;
        
        $newMaterials->save();
        return response()->json($newMaterials);
    }

    public function ShowMaterial($id){
        $Materials = Material::findOrFail($id);

        return response()->json($Materials);
    }

    public function ListMaterial(){
        $Materialss = Material::all();
        return response()->json($Materialss);
    }

    public function DeleteMaterial($id){
        Material::destroy($id);
        return response('habilidade deletada!');
    }

    public function UpdateMaterial(request $newMaterialsData, $id){

        $MaterialsData = Material::findOrFail($id);

        if($newMaterialsData){
            if($newMaterialsData->url){
                $MaterialsData->url = $newMaterialsData->url;
            }
        }
        $MaterialsData->save();
        return response()->json($MaterialsData);
    }
}
