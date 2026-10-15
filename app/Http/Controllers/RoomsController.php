<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoomsController extends Controller
{
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
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomsRequest $request)
    {
        if (Auth::user()->role == 'admin') {
            $room = new Rooms();
            $room->name = $request->name;
            $image = Storage::disk('public')->putFile('image', $request->image);
            $room->image = $image;
            $room->save();
            return redirect()->route('index');
        }
        return abort(403);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rooms $rooms)
    {
        // $roomss = Rooms::get();
        // return view('index', compact('roomss', 'rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rooms $rooms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomsRequest $request, Rooms $rooms)
    {
        if (Auth::user()->role == 'admin') {
            $rooms->name = $request->name;
            if ($request->image) {
                Storage::delete($rooms->image);
                $image = Storage::disk('public')->putFile('image', $request->image);
                $rooms->image = $image;
            }
            $rooms->save();
            return redirect()->route('index');
        }
        return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rooms $rooms)
    {
        if (Auth::user()->role == 'admin') {
            $rooms->delete();
            return redirect()->route('index');
        }
        return abort(403);
    }
}
