<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
Use App\Models\People;
Use Log;
class PersonController extends Controller
{  

    
    public function getPersonCount()
    {
        $count = DB::table('people')->count();
        return response()->json($count,200);

    }

    public function getPerson(){
    $data = People::get();
    return response()->json($data,200);
    }

    public function getPersonById($id){
        $data=People::find($id);
        if(is_null($data)){
        return response()->json(['message'=>'utente non trovato'],404);
        }
        return response()->json($data::find($id),200);
    }

    public function addPerson(Request $request){
        $data['nome'] = $request['nome'];
        $data['cognome'] = $request['cognome'];
        $data['citta'] = $request['citta'];
        $data['telefono'] = $request['telefono'];
        $data['cap'] = $request['cap'];
        $data['country'] = $request['country'];
        $data=People::create($data);
        return response($data,201);
    }

    public function updatePerson(Request $request,$id){
        $data=People::find($id);
        if(is_null($data)){
        return response()->json(['message'=>'utente non trovato'],404);
        }
        $data->update($request->all());
        return response($data,200);
    }
    public function deletePerson(Request $request,$id){
        $data=People::find($id);
        if(is_null($data)){
            return response()->json(['message'=>'utente non trovato'],404);
        }

        $data->delete();
        return response()->json(null,204);
    }


}