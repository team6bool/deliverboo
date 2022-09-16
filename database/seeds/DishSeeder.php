<?php

use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [
            [
                'user_id' => 1,
                'name' => 'Pizza',
                'price' => 10.99,
                'description' => 'Pizza is a savory dish of Italian origin, consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients (such as anchovies, mushrooms, onions, olives, pineapple, meat, etc.), which is then baked at a high temperature, traditionally in a wood-fired oven. A small pizza is sometimes called a pizzetta.',
                'img' => 'pizza.jpg',
                'visible' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'Burger',
                'price' => 8.99,
                'description' => 'A hamburger (also burger for short) is a sandwich consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun. The patty may be pan fried, barbecued, or flame broiled. Hamburgers are often served with cheese, lettuce, tomato, onion, pickles, bacon, or chiles.',
                'img' => 'burger.jpg',
                'visible' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'Pasta',
                'price' => 9.99,
                'description' => 'Pasta is a staple food of traditional Italian cuisine, with the first reference dating to 1154 in Sicily. It is also commonly used to refer to the variety of pasta dishes. Italian pasta is made from an unleavened dough of a durum wheat flour mixed with water or eggs, and formed into sheets or various shapes, then cooked by boiling or baking.',
                'img' => 'pasta.jpg',
                'visible' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'French Fries',
                'price' => 4.99,
                'description' => 'French fries, or simply fries (North American English), chips (British and Commonwealth English, Hiberno-English), finger chips (Indian English), or French-fried potatoes, are batonnet or allumette-cut deep-fried potatoes.',
                'img' => 'french-fries.jpg',
                'visible' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'Chicken Wings',
                'price' => 6.99,
                'description' => 'Chicken wings are chicken drumettes or flats that are generally eaten fried after being coated in a sauce or dry seasoning. They are often served as an appetizer or bar food. Chicken wings are a popular food in many cuisines, including American, Chinese, Indian, and Thai.',
                'img' => 'chicken-wings.jpg',
                'visible' => true,
            ]
        ];
    }
}
