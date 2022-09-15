<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $myCategories = [
            [
                "Categoria" => "Sushi",
                "Immagine" => "sushi.png",
            ],
            [
                "Categoria" => "Kebab",
                "Immagine" => "kebab.png",
            ],
            [
                "Categoria" => "Pizza",
                "Immagine" => "pizza.png",
            ],
            [
                "Categoria" => "Poke",
                "Immagine" => "poke.png",
            ],
            [
                "Categoria" => "Burger",
                "Immagine" => "burger.png",
            ],
            [
                "Categoria" => "Veg",
                "Immagine" => "veg.png",
            ],
            [
                "Categoria" => "Carne",
                "Immagine" => "carne.png",
            ],
            [
                "Categoria" => "Pesce",
                "Immagine" => "pesce.png",
            ],
            [
                "Categoria" => "Glutenfree",
                "Immagine" => "gluten-free.png",
            ],
            [
                "Categoria" => "Pasta",
                "Immagine" => "pasta.png",
            ],
            [
                "Categoria" => "Thai",
                "Immagine" => "thai.png",
            ],
            [
                "Categoria" => "Indiano",
                "Immagine" => "indiano.png",
            ],
            [
                "Categoria" => "Gourmet",
                "Immagine" => "gourmet.png",
            ],
            [
                "Categoria" => "Torte",
                "Immagine" => "torte.png",
            ],
            [
                "Categoria" => "Gelato",
                "Immagine" => "gelato.png",
            ],
        ];

        foreach ($myCategories as $category) {
            Category::create([
                "name" => $category["Categoria"],
                "img" => $category["Immagine"],
            ]);
        }
    }
}
