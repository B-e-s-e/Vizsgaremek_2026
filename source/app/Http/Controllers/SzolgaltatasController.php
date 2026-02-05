<?php

namespace App\Http\Controllers;

use App\Models\Szolgaltatas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SzolgaltatasController extends Controller
{
    public function index(){
        return Szolgaltatas::with('munka') -> get();
    }

    /*  $table->id();
        $table->foreignId('munka') -> references('id') -> on('munkak');
        $table->integer('ar'); */

    public function store(Request $request){
        $validator = Validator::make($request->all(),
        [
            'munka'=>'required',
            'ar'=>'required'
        ]);
        if($validator->fails())
        {
            return response()->json(['Hibaüzenet'=>'Valamelyik kötelező adat hiányzik'],406);
        }

        $szolgaltatas = Szolgaltatas::create($request -> all());
        return response() -> json(['Új szolgáltatás létrehozva. Dátum:' => $szolgaltatas -> munka -> datum], 201);
    }

    public function getByPrice(Request $request){
        $szolgaltatas = Szolgaltatas::where('ar', '=', $request -> ar);
        if($szolgaltatas -> exists()){
            return $szolgaltatas -> get();
        }
        else{
            return response() -> json(['Hiba:' => 'Nem található a keresésnek megfelelő szolgáltatás.'], 404);
        }
    }

    public function update(Request $request, $id){
        $szolgaltatas = Szolgaltatas::find($id);
        if(is_null($szolgaltatas)){
            return response() -> json(['Hiba:' => 'Nem található a frissíteni kívánt szolgáltatás.'], 404);
        }
        else{

            $validator = Validator::make($request->all(),
            [
            'munka'=>'required',
            'ar'=>'required'
            ]);

            if($validator->fails())
            {
                return response()->json(['Hibaüzenet'=>'Valamelyik kötelező adat hiányzik'],406);
            }
            else{
                $szolgaltatas -> update($request ->all());
                return response() -> json(['Szolgáltatás sikeresen frissítve:' => $szolgaltatas -> munka -> datum], 206);
            }

            
        }
    }

    public function destroy($id){
        $szolgaltatas = Szolgaltatas::find($id);
        if(is_null($szolgaltatas)){
            return response('A törölni kívánt szolgáltatás nem található.', 404);
            
        }
        else{
            $szolgaltatas -> delete();
            return response('Szolgáltatás eltávolítva az adatbázisból.', 202);
        }
    }
}
