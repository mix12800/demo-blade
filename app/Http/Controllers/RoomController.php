<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['rooms' => Room::all()]);
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
    public function store(StoreRoomRequest $request)
    {
        if (Auth::user()->role == 'admin') {
            $room = new Room();
            $room->name = $request->name;
            $image = Storage::disk('public')->putFile('image', $request->image);
            $room->image = $image;
            $room->save();
            return response()->json(['room' => $room]);
        }
        return response()->json(["errors" => ["message" => "Доступ запрещен"]], 403);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return response()->json(['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        if (Auth::user()->role == 'admin') {
            $room->name = $request->name;
            if ($request->image) {
                $image = Storage::disk('public')->putFile('image', $request->image);
                $room->image = $image;
            }
            $room->save();
            return response()->json(['room' => $room]);
        }
        return response()->json(["errors" => ["message" => "Доступ запрещен"]], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        if (Auth::user()->role == 'admin') {
            $room->delete();
            return response()->json(['message' => 'ok']);
        }
        return response()->json(["errors" => ["message" => "Доступ запрещен"]], 403);
    }
}
