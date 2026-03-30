<?php

namespace App\Http\Controllers;

use App\Models\Felhasznalo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FelhasznaloController extends Controller
{
    public function index()
    {
        return Felhasznalo::latest()->get();
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nev' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:50|unique:felhasznalok,phonenumber',
            'email' => 'required|email|unique:felhasznalok,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Felhasznalo::create([
            'nev' => $request->nev,
            'phonenumber' => $request->phonenumber,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(60),
            'role' => 'user',
        ]);

        return response()->json([
            'message' => 'Sikeres regisztráció.',
            'token' => $user->api_token,
            'user' => $user,
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Felhasznalo::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Hibás email vagy jelszó.'], 401);
        }

        $user->api_token = Str::random(60);
        $user->save();

        return response()->json([
            'message' => 'Sikeres bejelentkezés.',
            'token' => $user->api_token,
            'user' => $user,
        ]);
    }

    public function me(Request $request)
    {
        return response()->json($request->attributes->get('user'));
    }

    public function logout(Request $request)
    {
        $user = $request->attributes->get('user');
        $user->api_token = null;
        $user->save();
        return response()->json(['message' => 'Sikeres kijelentkezés.']);
    }
}
