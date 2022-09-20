<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function findBySlug($slug)
    {
        $dish = Dish::where("slug", $slug)->first();

        if (!$dish) {
            abort(404);
        }

        return $dish;
    }

    private function generateSlug($text)
    {
        $toReturn = null;
        $counter = 0;

        do {
            $slug = Str::slug($text);

            if ($counter > 0) {
                $slug .= "-" . $counter;
            }

            $slug_esiste = Dish::where("slug", $slug)->first();

            if ($slug_esiste) {
                $counter++;
            } else {
                $toReturn = $slug;
            }
        } while ($slug_esiste);

        return $toReturn;
    }

    public function index()
    {
        $user = Auth::user();

        //shows only the dishes of the logged user
        $dishes = Dish::orderBy("name", "asc")->where('user_id', Auth::id())->get();;

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
            "description" => "",
            "price" => "required|numeric",
            "img" => "image|mimes:jpeg,png,jpg,gif,svg|max:3000",
            "visible" => "boolean|required",
        ]);

        //save img into public/imeges/dishes folder
        if (request()->hasFile("img")) {
            $file = request()->file('img');
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $fileToStore = $fileName . '_' . time() . '.' . $fileExtension;
            $path = $file->storeAs('public/images/dishes', $fileToStore);
        }

        $dish = new Dish();
        $dish->fill($validatedData);
        if (isset($fileToStore)) {
            $dish->img = $validatedData["img"] ? $fileToStore : null;
        }
        $dish->user_id = Auth::user()->id;

        $dish->slug = $this->generateSlug($validatedData["name"]);

        $dish->save();

        return redirect()->route("admin.dishes.show", $dish->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $dish = $this->findBySlug($slug);

        if ($dish->user_id != auth()->id()) {
            abort(403, 'Questo non è un tuo piatto!');
        }

        return view("admin.dishes.show", compact("dish"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $dishes = $this->findBySlug($slug);

        if ($dishes->user_id != auth()->id()) {
            abort(403, 'Questo non è un tuo piatto!');
        }

        return view("admin.dishes.edit", compact("dishes"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "description" => "",
            "price" => "required|numeric",
            "img" => "image|mimes:jpeg,png,jpg,gif,svg|max:3000",
            "visible" => "boolean|required",
        ]);

        $dish = $this->findBySlug($slug);

        //save img into public/imeges/dishes folder
        //check if img file already exists and delete the previous one

        if (request()->hasFile("img")) {
            Storage::delete("public/images/dishes/" . $dish->img);
            $file = request()->file('img');
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $fileToStore = $fileName . '_' . time() . '.' . $fileExtension;
            $path = $file->storeAs('public/images/dishes', $fileToStore);
        }
        $dish->fill($validatedData);
        $dish->img = $validatedData["img"] ? $fileToStore : null;

        $dish->user_id = Auth::user()->id;

        $dish->slug = $this->generateSlug($validatedData["name"]);

        $dish->save();

        return redirect()->route("admin.dishes.show", $dish->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $dish = $this->findBySlug($slug);

        Storage::delete("public/images/dishes/" . $dish->img);

        $dish->delete();

        return redirect()->route("admin.dishes.index");
    }
}
