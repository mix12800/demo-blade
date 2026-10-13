<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function registration(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        return response()->json(['token' => $user->createToken("api")->plainTextToken]);
    }

    public function auth(AuthUserRequest $request)
    {
        $user = User::where('login', $request->login)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json(['token' => $user->createToken("api")->plainTextToken]);
        }
        return response()->json(['errors' => ['login' => ["Ошибка входа"]]]);
    }


    public   function userget() {
        return response()->json(['user'=>Auth::user()]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
