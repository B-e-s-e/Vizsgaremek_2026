<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutoController extends Controller
{
    public function index()
    {
        return Auto::with('felhasznalo')->latest()->get();
    }

    public function mine(Request $request)
    {
        $user = $request->attributes->get('user');
        return Auto::where('felhasznalo_id', $user->id)->latest()->get();
    }

    public function store(Request $request)
    {
        $user = $request->attributes->get('user');
        $validator = Validator::make($request->all(), [
            'marka' => 'required|string|max:255',
            'tipus' => 'required|string|max:255',
            'evjarat' => 'required|integer|min:1900|max:2100',
            'rendszam' => 'required|string|max:20|unique:autok,rendszam',
            'szin' => 'nullable|string|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $auto = Auto::create([
            'marka' => $request->marka,
            'tipus' => $request->tipus,
            'evjarat' => $request->evjarat,
            'rendszam' => strtoupper($request->rendszam),
            'szin' => $request->szin,
            'felhasznalo_id' => $user->id,
        ]);
        return response()->json($auto, 201);
    }

    public function destroy(Request $request, int $id)
    {
        $user = $request->attributes->get('user');
        $auto = Auto::where('id', $id)->where('felhasznalo_id', $user->id)->first();

        if (!$auto) {
            return response()->json(['message' => 'Az autó nem található vagy nem törölhető.'], 404);
        }

        $auto->delete();
        return response()->json(['message' => 'Az autó törölve lett.']);
    }
}
