<?php

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
                "Immagine" => "",
            ],
            [
                "Categoria" => "Kebab",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Pizza",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Poke",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Burger",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Veg",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Carne",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Pesce",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Glutenfree",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Pasta",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Thai",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Indiano",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Gourmet",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Torte",
                "Immagine" => "",
            ],
            [
                "Categoria" => "Gelato",
                "Immagine" => "",
            ],
        ];

        foreach ($myCategories as $category) {
            $data = new Category();

            $data->Categoria = $category["Categoria"];
            $data->Immagine = $category["Immagine"];

            $data->save();
        }
    }
}
