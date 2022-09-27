<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Order;
use App\Mail\CustomerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->orders()->orderBy('created_at', 'desc')->get();

        return view("admin.orders.index", compact("orders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        //shows only the dishes of the logged user
        $dishes = Dish::orderBy("name", "asc")->where('user_id', Auth::id())->get();

        return view("admin.orders.create", compact("dishes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|min:3",
            "lastname" => "required|min:3",
            "address" => "required",
            "email" => "required",
            "phone" => "required|min:8",
            "total" => "required",
            "dishes" => "required",
        ]);

        $order = new Order();
        $order->fill($validatedData);

        $order->user_id = Auth::id();

        $order->save();

        //attach dishes to order
        foreach ($request->dishes as $dish) {
            $order->dishes()->attach($dish, ['quantity' => $dish, 'subtotal' => $dish]);
        }

        return redirect()->route("admin.orders.show", $order->id);

        Mail::to($order->user->email)->send(new CustomerMail($order));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id != auth()->id()) {
            abort(403, 'Questo non è un tuo ordine!');
        }

        return view("admin.orders.show", compact("order"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
