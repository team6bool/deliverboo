<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();
        if ($user->role == "admin") {
            $dishes = Dish::orderBy("name", "asc")->paginate(10);
        } else {
            return;
        }

        return view("admin.dishes.index", compact("dishes", "user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.dishes.create");
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
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:3000",
            "visible" => "boolean",
        ]);

        $dish = new Dish();
        $dish->fill($validatedData);
        $dish->user_id = Auth::user()->id;

        if (array_key_exists("image", $validatedData)) {
            $path = Storage::put("dishes", $validatedData["image"]);
            $dish->image = $path;
        }

        $slug = Str::slug($validatedData["name"]);

        if ($slug == Dish::where("slug", $slug)->first()) {
            $slug = $slug . "-" . rand(1, 1000);
        } else {
            $dish->slug = $slug;
        }

        $dish->save();

        return redirect()->route("admin.dishes.show", $dish->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        $dish = Dish::where("slug", $dish->slug)->first();

        return view("admin.dishes.show", compact("dish"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
