<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function showRegistrationForm()
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    private function findBySlug($slug)
    {
        $post = User::where("slug", $slug)->first();

        if (!$post) {
            abort(404);
        }

        return $post;
    }

    private function generateSlug($text)
    {
        $toReturn = null;
        $counter = 0;

        do {
            // generiamo uno slug partendo dal titolo
            $slug = Str::slug($text);

            // se il counter é maggiore di 0, concateno il suo valore allo slug
            if ($counter > 0) {
                $slug .= "-" . $counter;
            }

            // controllo a db se esiste già uno slug uguale
            $slug_esiste = User::where("slug", $slug)->first();

            if ($slug_esiste) {
                // se esiste, incremento il contatore per il ciclo successivo
                $counter++;
            } else {
                // Altrimenti salvo lo slug nei dati del nuovo post
                $toReturn = $slug;
            }
        } while ($slug_esiste);

        return $toReturn;
    }

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['nullable', 'string', 'min:8', 'max:15'],
            'website' => ['nullable', 'string', 'min:8', 'max:200'],
            'address' => ['required', 'string', 'max:100'],
            'img' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:3000'],
            'description' => ['nullable', 'string', 'max:2000'],
            'p_iva' => ['required', 'string', 'min:11', 'max:11'],
            'delivery_price' => ['required', 'numeric', 'min:0', 'max:99.99'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'website' => $data['website'],
            'address' => $data['address'],
            'img' => $data['img'],
            'description' => $data['description'],
            'p_iva' => $data['p_iva'],
            'delivery_price' => $data['delivery_price'],
            'slug' => $this->generateSlug($data['name']),
        ]);

        if (request()->hasFile('img')) {
            $file = request()->file('img');
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $fileToStore = $fileName . '_' . time() . '.' . $fileExtension;
            $path = $file->storeAs('public/images/restaurants', $fileToStore);
        }

        $user->categories()->attach($data['categories']);

        return $user;
    }
}
