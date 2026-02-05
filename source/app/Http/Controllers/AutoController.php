<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutoController extends Controller
{
    public function index(){
        return Auto::with('felhasznalo') -> get();
        
    }

    /*
        $table->id();
        $table->string('marka');
        $table->string('tipus');
        $table->integer('evjarat');
        $table->string('rendszam') -> unique();
        $table->foreignId('felhasznalo') -> references('id') -> on('felhasznalok');
    */

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'marka'=>'required',
            'tipus'=>'required',
            'evjarat'=>'required',
            'rendszam' => 'required',
            'felhasznalo' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['Hibaüzenet'=>'Valamelyik kötelező adat hiányzik'],406);
        }

        $auto=Auto::create($request->all());
        return response()->json(['Új autó létrehozva. Rendszám:'=>$auto->rendszam],201);
    }

    public function getByOwner(Request $request){
        $auto = Auto::where('felhasznalo', '=', $request -> felhasznalo);
        if($auto -> exists()){
            return $auto -> get();
            
        }
        else{
            return response() -> json(['Hiba:' => 'Nincs regisztrálva autó ilyen nevű tulajdonossal.'], 404);
        }
    }

    public function update(Request $request, $id){
        

        $auto = Auto::find($id);
        if(is_null($auto)){
            return response() -> json(['Hiba:' => 'Nem található a frissíteni kívánt autó.'], 404);
        }
        else{

            $validator=Validator::make($request->all(),
            [
            'marka'=>'required',
            'tipus'=>'required',
            'evjarat'=>'required',
            'rendszam' => 'required',
            'felhasznalo' => 'required'
            ]);

            if($validator->fails())
            {
                return response()->json(['Hibaüzenet'=>'Valamelyik kötelező adat hiányzik'],406);
            }
            else{
                $auto -> update($request -> all());
                return response() -> json(['Autó sikeresen frissítve:' => $auto -> rendszam], 206);
            }

            
        }
    }

    public function destroy($id){
        $auto = Auto::find($id);
        if(is_null($auto)){
            return response('A törölni kívánt autó nem található.', 404);
            
        }
        else{
            $auto -> delete();
            return response('Autó eltávolítva az adatbázisból.', 202);
        }
    }
}
