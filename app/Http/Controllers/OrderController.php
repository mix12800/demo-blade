<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // public function getorder()
    // {
    //     return response()->json(['orders' => Order::with('room', 'comment')->get()]);
    // }

    public function getmyorder()
    {
        return response()->json(['orders' => Order::with('room', 'comment')->orderBy('created_at', 'desc')->where('user_id', Auth::id())->get()]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['orders' => Order::with('room', 'comment')->get()]);
        // return response()->json(['orders' => Order::with('room')->where('status', '!=', 'new')->paginate(3)]);
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
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all() + ['user_id' => Auth::id()]);
        return response()->json(['order' => $order]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return response()->json(['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        if (Auth::user()->role == 'admin') {
            $order->status = $request->status;
            $order->save();
            return response()->json(['order' => $order]);
        }
        return response()->json(["errors" => ["message" => "Доступ запрещен"]], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
