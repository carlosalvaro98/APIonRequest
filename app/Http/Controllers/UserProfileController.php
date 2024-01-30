<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userProfiles = UserProfile::all();
        return response()->json($userProfiles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user_profiles',
            'password' => 'required',
        ]);

        $userProfile = UserProfile::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return response()->json($userProfile, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userProfile = UserProfile::find($id);
        if (!$userProfile) {
            return response()->json(['error' => 'User profile not found'], 404);
        }
        return response()->json($userProfile);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|unique:user_profiles,username,' . $id,
            'password' => 'required',
        ]);

        $userProfile = UserProfile::find($id);
        if (!$userProfile) {
            return response()->json(['error' => 'User profile not found'], 404);
        }

        $userProfile->username = $request->username;
        $userProfile->password = bcrypt($request->password);
        $userProfile->save();

        return response()->json($userProfile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userProfile = UserProfile::find($id);
        if (!$userProfile) {
            return response()->json(['error' => 'Perfil inválido'], 404);
        }

        $userProfile->delete();

        return response()->json(['message' => 'Perfil apagado com sucesso']);
    }
}
