<?php

use App\Order;
use App\User;
use App\Dish;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $orders = [
            [
                'user_id' => 1,
                'name' => 'Alessio',
                'lastname' => 'Ciccarelli',
                'address' => 'Via Roma 1',
                'email' => 'alessiociccarelli@gmial.com',
                'total' => 45.54,
                'phone' => '3345678901',
                'created_at' => '2022-05-23 22:15:00',
            ],
            [
                'user_id' => 1,
                'name' => 'Mirco',
                'lastname' => 'De Angelis',
                'address' => 'Via Delle Rose 2',
                'email' => 'mircodeangelis@gmail.com',
                'total' => 65.34,
                'phone' => '3534567890',
                'created_at' => '2022-04-23 15:15:00',
            ],
            [
                'user_id' => 1,
                'name' => 'Mariana',
                'lastname' => 'Giacomelli',
                'address' => 'Via Panoramica 3',
                'email' => 'marianagiacomelli03@gmail.com',
                'total' => 43.54,
                'phone' => '3123456789',
                'created_at' => '2022-03-29 12:15:00',
            ],
            [
                'user_id' => 2,
                'name' => 'Gigliana',
                'lastname' => 'Kostova',
                'address' => 'Via Europa 4',
                'email' => 'giglianakosova43@gmail.com',
                'total' => 23.54,
                'phone' => '3545678901',
                'created_at' => '2022-02-23 22:15:00',
            ],
            [
                'user_id' => 2,
                'name' => 'Riccardo',
                'lastname' => 'Mancini',
                'address' => 'Via Giuseppe Verdi 5',
                'email' => 'riccardomancini@gmail.com',
                'total' => 54.23,
                'phone' => '3923456789',
                'created_at' => '2022-01-23 18:15:00',
            ],
            [
                'user_id' => 2,
                'name' => 'Alessandra',
                'lastname' => 'Ferrari',
                'address' => 'Via Spiaggia Sottile 6',
                'email' => 'alessandraferrari@gmail.com',
                'total' => 65.23,
                'phone' => '3850678901',
                'created_at' => '2022-09-21 18:17:00',
            ],
            [
                'user_id' => 3,
                'name' => 'Riccardo',
                'lastname' => 'Mancini',
                'address' => 'Via Giuseppe Verdi 5',
                'email' => 'riccardomancini@gmail.com',
                'total' => 90.43,
                'phone' => '3923456789',
                'created_at' => '2022-07-23 18:15:00',
            ],
            [
                'user_id' => 3,
                'name' => 'Alessio',
                'lastname' => 'Sedia',
                'address' => 'Via Panoramica, 88',
                'email' => 'alessiosedia@gmail.com',
                'total' => 48, 60,
                'phone' => '3384455669',
                'created_at' => '2022-08-16 13:07:32',
            ],
            [
                'user_id' => 3,
                'name' => 'Renato',
                'lastname' => 'Pozzo',
                'address' => 'Via della Strada, 18',
                'email' => 'renatopozzo@gmail.com',
                'total' => 65, 30,
                'phone' => '3384477869',
                'created_at' => '2022-07-31 20:07:44',
            ],
            [
                'user_id' => 4,
                'name' => 'Arturo',
                'lastname' => 'Ercole',
                'address' => 'Via Espresso, 28',
                'email' => 'arturoercole@gmail.com',
                'total' => 77, 20,
                'phone' => '3334422689',
                'created_at' => '2022-07-29 20:14:32',
            ],
            [
                'user_id' => 4,
                'name' => 'Michele',
                'lastname' => 'Rocca',
                'address' => 'Via Panoramica, 133',
                'email' => 'michelerocca@gmail.com',
                'total' => 78, 40,
                'phone' => '3401155610',
                'created_at' => '2022-06-29 15:07:11',
            ],
            [
                'user_id' => 4,
                'name' => 'Marcello',
                'lastname' => 'Mastrone',
                'address' => 'Via delle Fontane, 88',
                'email' => 'marcellomastrone@gmail.com',
                'total' => 66, 00,
                'phone' => '3420011870',
                'created_at' => '2022-05-14 22:10:21',
            ],
            [
                'user_id' => 5,
                'name' => 'Luca',
                'lastname' => 'Antoni',
                'address' => 'Via della Ponzese, 140',
                'email' => 'lucaantoni@gmail.com',
                'total' => 35, 50,
                'phone' => '3455588310',
                'created_at' => '2022-08-30 12:44:12',
            ],
            [
                'user_id' => 5,
                'name' => 'Giulia',
                'lastname' => 'Ninni',
                'address' => 'Via Casale, 18',
                'email' => 'giulianinni@gmail.com',
                'total' => 88, 60,
                'phone' => '3381136979',
                'created_at' => '2022-08-16 13:07:32',
            ],
            [
                'user_id' => 5,
                'name' => 'Maria',
                'lastname' => 'Annetta',
                'address' => 'Via Panoramica, 6',
                'email' => 'mariaannetta@gmail.com',
                'total' => 70, 50,
                'phone' => '3377788432',
                'created_at' => '2022-06-12 12:27:30',
            ],
            [
                'user_id' => 6,
                'name' => 'Valerio',
                'lastname' => 'Rossoni',
                'address' => 'Via Farfalle, 78',
                'email' => 'valeriorossoni@gmail.com',
                'total' => 69, 20,
                'phone' => '3384455009',
                'created_at' => '2022-08-16 13:37:12',
            ],
            [
                'user_id' => 7,
                'name' => 'Nicola',
                'lastname' => 'Bari',
                'address' => 'Via Cefalu, 77',
                'email' => 'nicolabari@gmail.com',
                'total' => 19, 90,
                'phone' => '3331150055',
                'created_at' => '2022-08-11 14:14:12',
            ],
            [
                'user_id' => 8,
                'name' => 'Giacomo',
                'lastname' => 'Poretti',
                'address' => 'Via Ortolani, 18',
                'email' => 'GiacomoPoretti@gmail.com',
                'total' => 124,
                'phone' => '3476690358',
                'created_at' => '2022-08-16 13:09:21',
            ],
            [
                'user_id' => 8,
                'name' => 'Aldo',
                'lastname' => 'Baglio',
                'address' => 'Viale Italia, 34',
                'email' => 'AldoBaglio@gmail.com',
                'total' => 161,
                'phone' => '3477250341',
                'created_at' => '2022-09-16 17:49:37',
            ],
        ];

        $names = [
            'Marco',
            'Andrea',
            'Giovanni',
            'Alessio',
            'Arturo',
            'Luca',
            'Paolo',
            'Valentina',
            'Giulia',
            'Erica',
            'Maria',
            'Giovanna',
            'Giorgio',
            'Luigi',
            'Francesco',
            'Miriana',
        ];

        $lastnames = [
            'Sedia',
            'Della Ponza',
            'Arn??',
            'Dercole',
            'Mazzella',
            'Marzini',
            'Motta',
            'Ruggeri',
            'De Falchi',
            'Totti',
            'Riga',
            'Di Divani',
            'Rosso',
            'Carnasciali',
            'Carrozzieri',
            'Lupeni',
        ];

        $addresses = [
            'Via Panoramica, 32',
            'Via della Sedia, 71',
            'Via Ponzese, 74',
            'Via Panoramica, 44',
            'Via Verace, 11',
            'Via Celestina, 120',
            'Via Panoramica, 55',
            'Via Basilico, 33',
            'Via Statteri, 1',
            'Via Panoramica, 144',
            'Via dei Giardinelli, 85',
            'Via Valentini, 94',
            'Via Panoramica, 11',
            'Via Comasche, 22',
            'Via Mazzelli, 105',
    ];

    for ($i = 0; $i < 1700; $i++) {
        $randomAddresses = Arr::random($addresses);
        $randomNames = Arr::random($names);
        $randomLastnames = Arr::random($lastnames);
        $newOrder = new Order();
        $newOrder->user_id = 3;
        $newOrder->name = $randomNames;
        $newOrder->lastname = $randomLastnames;
        $newOrder->email = $faker->email();
        $newOrder->address = $randomAddresses;
        $newOrder->phone = $faker->e164PhoneNumber();
        $newOrder->created_at = $faker->dateTimeBetween('-9 months', 'now');
        // $newOrder->quantity = rand(1, 10);
        $newOrder->total = rand(10,250);

        $newOrder->save();
    }

        foreach ($orders as $order) {
            Order::create([
                'user_id' => $order['user_id'],
                'name' => $order['name'],
                'lastname' => $order['lastname'],
                'address' => $order['address'],
                'email' => $order['email'],
                'total' => $order['total'],
                'phone' => $order['phone'],
                'created_at' => $order['created_at'],
            ]);
        }
    }
}
