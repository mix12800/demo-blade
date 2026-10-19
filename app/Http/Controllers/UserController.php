<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Orders;
use App\Models\Rooms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function OrderPage()
    {
        $roomss = Rooms::get();
        return view('OrderPage', compact('roomss'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }


    public function registration(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        Auth::login($user);
        return redirect()->route('index');
    }

    public function auth(AuthUserRequest $request)
    {
        $user = User::where('login', $request->login)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('index');
        }
        return back()->withErrors(['login' => 'Ошибка входа'])->withInput();
    }

    public function authPage()
    {
        return view('auth');
    }


    // public function userget()
    // {
    //     return response()->json(['user' => Auth::user()]);
    // }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 'admin') {
                $roomss = Rooms::get();
                return view('index', compact('roomss'));
            } else {
                $orders = Orders::with('room', 'comments')->where('user_id', Auth::id())->get();
                return view('index', compact('orders'));
            }
        }
        return view('index');
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
    public function store(StoreUserRequest $request)
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
