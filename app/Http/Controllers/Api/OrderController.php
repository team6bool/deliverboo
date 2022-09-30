<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendOrderMailToRestaurant;
use App\Mail\SendOrderMailToUser;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data and fill
        $validatedOrderData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:50',
            'lastname' => 'required|max:50',
            'address' => 'required|max:100',
            'phone' => 'required|max:15',
            'email' => 'required|max:50',
            'total' => 'required|numeric',
        ]);


        $newOrder = new Order();
        $newOrder->fill($validatedOrderData);
        $newOrder->save();

        if (is_array($request->dishes) || is_object($request->dishes)) {
            foreach ($request->dishes as $dish) {
                $newOrder->dishes()->attach($dish['dish_id'], ['quantity' => $dish['quantity'], 'subtotal' => $dish['subtotal']]);
            }
        } else
        {
            echo "Unfortunately, an error occured.";
        }

        //mail section
        Mail::to($newOrder->email)->send(new SendOrderMailToUser($newOrder));
        $restaurant = User::find($newOrder->user_id);
        Mail::to($restaurant->email)->send(new SendOrderMailToRestaurant($newOrder));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
