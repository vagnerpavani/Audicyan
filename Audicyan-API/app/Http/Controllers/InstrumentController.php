<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instrument;

class InstrumentController extends Controller
{
    public function CreateInstrument(request $instrument){
        $newInstrument = new Instrument;

        $newInstrument->name = $instrument->name;
        $newInstrument->type = $instrument->type;
        
        $newInstrument->save();
        return response()->json($newInstrument);
    }

    public function ShowInstrument($id){
        $instrument = Instrument::findOrFail($id);

        return response()->json($instrument);
    }

    public function ListInstruments(){
        $instruments = Instrument::all();
        return response()->json($instruments);
    }

    public function DeleteInstrument($id){
        Instrument::destroy($id);
        return response('instrumento deletado!');
    }

    public function UpdateInstrument(request  $newInstrumentData, $id){

        $instrumentData = Instrument::findOrFail($id);

        if($newInstrumentData){
            if($newInstrumentData->name){
                $instrumentData->name = $newInstrumentData->name;
            }
            if($newInstrumentData->type){
                $instrumentData->type = $newInstrumentData;
            }
        }
        $instrumentData->save();
        return response()->json($instrumentData);
    }
}
