<?php

namespace App\Http\Controllers;

use App\Models\Munka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MunkaController extends Controller
{

    public function adminIndex()
    {
        return Munka::with(['auto', 'felhasznalo', 'szolgaltatas'])
            ->latest()
            ->get();
    }

    public function mine(Request $request)
    {
        $user = $request->attributes->get('user');
        return Munka::with(['auto', 'szolgaltatas'])
            ->where('felhasznalo_id', $user->id)
            ->latest()
            ->get();
    }

    public function store(Request $request)
    {
        $user = $request->attributes->get('user');
        $validator = Validator::make($request->all(), [
            'auto_id' => 'required|exists:autok,id',
            'szolgaltatas_id' => 'required|exists:szolgaltatasok,id',
            'datum' => 'required|date',
            'helyszin' => 'required|string|max:255',
            'megjegyzes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $munka = Munka::create([
            'auto_id' => $request->auto_id,
            'felhasznalo_id' => $user->id,
            'szolgaltatas_id' => $request->szolgaltatas_id,
            'datum' => $request->datum,
            'helyszin' => $request->helyszin,
            'megjegyzes' => $request->megjegyzes,
            'ar' => (int) $request->ar,
            'allapot' => 'Foglalva',
        ]);

        return response()->json(Munka::with(['auto', 'szolgaltatas'])->find($munka->id), 201);
    }

    public function destroyOwn(Request $request, int $id)
    {
        $user = $request->attributes->get('user');
        $munka = Munka::where('id', $id)->where('felhasznalo_id', $user->id)->first();

        if (!$munka) {
            return response()->json(['message' => 'A foglalás nem található vagy nem törölhető.'], 404);
        }

        $munka->delete();
        return response()->json(['message' => 'A foglalás törölve lett.']);
    }

    public function adminDestroy(int $id)
    {
        $munka = Munka::find($id);

        if (!$munka) {
            return response()->json(['message' => 'A megrendelés nem található.'], 404);
        }

        $munka->delete();
        return response()->json(['message' => 'A megrendelés törölve lett.']);
    }
}
