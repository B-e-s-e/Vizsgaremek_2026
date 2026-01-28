<?php

namespace App\Http\Controllers;

use App\Models\Takarito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TakaritoController extends Controller
{
    public function index(){
        return Takarito::all();
    }

    /* $table->id();
        $table->string('nev');
        $table->string('phonenumber') ->unique(); */

    public function store(Request $request){
        $validator = Validator::make($request->all(),
        [
            'nev'=>'required',
            'phonenumber'=>'required'
        ]);
        if($validator->fails())
        {
            return response()->json(['Hibaüzenet'=>'Valamelyik kötelező adat hiányzik'],406);
        }

        $takarito = Takarito::create($request -> all());
        return response() -> json(['Új takarító létrehozva. Név:' => $felhasznalo -> nev], 201);
    }

    public function update(Request $request, $id){
        $takarito = Takarito::find($id);
        if(is_null($takarito)){
            return response() -> json(['Hiba:' => 'Nem található a frissíteni kívánt takarító.'], 404);
        }
        else{

            $validator = Validator::make($request->all(),
            [
            'nev'=>'required',
            'phonenumber'=>'required'
            ]);

            if($validator->fails())
            {
                return response()->json(['Hibaüzenet'=>'Valamelyik kötelező adat hiányzik'],406);
            }
            else{
                $takarito -> update($request);
                return response() -> json(['Takarító sikeresen frissítve:' => $takarito -> nev], 206);
            }

            
        }
    }

    public function searchByName(Request $request){
        $takarito = Takarito::where('nev', '=', $request -> nev);
        if($takarito -> exists()){
            return $takarito -> get();
        }
        else{
            return response() -> json(['Hiba:' => 'Nem található a keresésnek megfeleő takarító.'], 404);
        }
    }

    public function destroy($id){
        $takarito = Felhasznalo::find($id);
        if(is_null($takarito)){
            return response('A törölni kívánt takarító nem található.', 404);
            
        }
        else{
            $felhasznalo -> delete();
            return response('Takarító eltávolítva az adatbázisból.', 202);
        }
    }
}
