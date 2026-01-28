<?php

namespace App\Http\Controllers;

use App\Models\Munka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MunkaController extends Controller
{
    public function index(){
        return  Munka::with([
        'auto',
        'felhasznalo',
        'takarito'
        ])->get();
    }

    /* $table->id();
    $table->foreignId('auto') -> references('id') -> on('autok');
    $table->foreignId('felhasznalo') -> references('id') -> on('felhasznalok');
    $table->foreignId('takarito') -> references('id') -> on('takaritok');
    $table->string('datum'); */

    public function store(Request $request){
        $validator = Validator::make($request->all(),
        [
            'auto'=>'required',
            'felhasznalo'=>'required',
            'takarito'=>'required',
            'datum' => 'required'
        ]);
        if($validator->fails())
        {
            return response()->json(['Hibaüzenet'=>'Valamelyik kötelező adat hiányzik'],406);
        }

        $munka = Munka::create($request -> all());
        return response() -> json(['Új munka létrehozva. Dátum:' => $munka -> datum], 201);
    }

    public function getByDate(Request $request){
        $munka = Munka::where('datum', '=', $request -> datum);
        if($munka -> exists()){
            return $munka -> get();
        }
        else{
            return response() -> json(['Hiba:' => 'Nem található a keresésnek megfelelő munka.'], 404);
        }
    }

    public function update(Request $request, $id){
        $munka = Munka::find($id);
        if(is_null($munka)){
            return response() -> json(['Hiba:' => 'Nem található a frissíteni kívánt munka.'], 404);
        }
        else{

            $validator = Validator::make($request->all(),
            [
            'auto'=>'required',
            'felhasznalo'=>'required',
            'takarito'=>'required',
            'datum' => 'required'
            ]);

            if($validator->fails())
            {
                return response()->json(['Hibaüzenet'=>'Valamelyik kötelező adat hiányzik'],406);
            }
            else{
                $munka -> update($request);
                return response() -> json(['Munka sikeresen frissítve:' => $munka -> datum], 206);
            }

            
        }
    }

    public function destroy($id){
        $munka = Munka::find($id);
        if(is_null($munka)){
            return response('A törölni kívánt munka nem található.', 404);
            
        }
        else{
            $felhasznalo -> delete();
            return response('Munka eltávolítva az adatbázisból.', 202);
        }
    }
}
