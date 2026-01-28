<?php

namespace App\Http\Controllers;

use App\Models\Felhasznalo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FelhasznaloController extends Controller
{
    public function index(){
        return Felhasznalo::all();
    }

    /* $table->id();
    $table->string('nev');
    $table->string('phonenumber') -> unique();
    $table->string('email') -> unique(); */

    public function store(Request $request){
        $validator = Validator::make($request->all(),
        [
            'nev'=>'required',
            'phonenumber'=>'required',
            'email'=>'required'
        ]);
        if($validator->fails())
        {
            return response()->json(['Hibaüzenet'=>'Valamelyik kötelező adat hiányzik'],406);
        }

        $felhasznalo = Felhasznalo::create($request -> all());
        return response() -> json(['Új felhasználó létrehozva. Név:' => $felhasznalo -> nev], 201);
    }

    public function update(Request $request, $id){
        $felhasznalo = Felhasznalo::find($id);
        if(is_null($felhasznalo)){
            return response() -> json(['Hiba:' => 'Nem található a frissíteni kívánt felhasználó.'], 404);
        }
        else{

            $validator = Validator::make($request->all(),
            [
            'nev'=>'required',
            'phonenumber'=>'required',
            'email'=>'required'
            ]);

            if($validator->fails())
            {
                return response()->json(['Hibaüzenet'=>'Valamelyik kötelező adat hiányzik'],406);
            }
            else{
                $felhasznalo -> update($request);
                return response() -> json(['Felhasználó sikeresen frissítve:' => $felhasznalo -> nev], 206);
            }

            
        }
    }

    public function searchByName(Request $request){
        $felhasznalo = Felhasznalo::where('nev', '=', $request -> nev);
        if($felhasznalo -> exists()){
            return $felhasznalo -> get();
        }
        else{
            return response() -> json(['Hiba:' => 'Nem található a keresésnek megfeleő felhasználó.'], 404);
        }
    }

    public function destroy($id){
        $fehasznalo = Felhasznalo::find($id);
        if(is_null($felhasznalo)){
            return response('A törölni kívánt felhasználó nem található.', 404);
            
        }
        else{
            $felhasznalo -> delete();
            return response('Felhaszáló eltávolítva az adatbázisból.', 202);
        }
    }
}
