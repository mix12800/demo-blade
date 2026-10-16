<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function PanelOrdersPage()
    {
        $orders = Orders::with('room')->get();
        return view('PanelOrders', compact('orders'));
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
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdersRequest $request)
    {
        Orders::create($request->all() + ['user_id' => Auth::id()]);
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdersRequest $request, Orders $orders)
    {
        if (Auth::user()->role == 'admin') {
            $orders->status = $request->status;
            $orders->save();
            return redirect()->route('PanelOrdersPage');
        }
        return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
