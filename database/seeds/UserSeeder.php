<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $restaurants = [
            [
                'name' => 'Ristorante Dieci Maggio',
                'description' => "Il Ristorante Dieci Maggio nasce dall'idea di trasformare la cucina tipica ponzese in una proposta gastronomica innovativa e dai sapori nuovi ed unici che vengono creati partendo da materie prime locali freschissime e di alta qualità.
                                La location è perfetta sia per serate tranquille che per degli eventi.
                                    Ideale per cene o pranzi per gruppi e piccole cerimonie.",
                'email' =>  'info@ristorantediecimaggio.com',
                'password' =>    'ristodiecimaggio1982',
                'address' => 'Via Loggia / località S.Maria - Ponza (LT)',
                'phone' => '0771820003',
                'website' => 'ristorantediecimaggioponza.it',
                'p_iva' =>  '02967100591',
                'img' => '/tartara-di-tonno.jpg',
                'delivery_price' =>  1, 50,
            ],
            [
                'name' => 'Il Melograno',
                'description' => "Circondato da pergolati di glicine, il raffinato ristorante Il Melograno, aperto nella stagione estiva, offre piatti tradizionali della cucina mediterranea accompagnati da una pregiata carta dei vini, studiata appositamente per soddisfare il palato e i gusti di ogni cliente.",
                'email' =>  'info@ristorantemelograno.mail',
                'password' =>    'santadomilia2003',
                'address' => 'Via Panoramica - Ponza (LT)',
                'phone' => '0771809951',
                'website' => 'www.santadomitilla.com/ristorante-il-melograno/',
                'p_iva' =>  '02967100787',
                'img' => '/gnocchetti-artigianali.jpg',
                'delivery_price' =>  3, 00,
            ],
            [
                'name' => 'Gamberi & Capperi',
                'description' => "Quando Luigi Nasti, Chef di Gamberi & Capperi, arriva a Ponza, scopre che qui, i pesci “sbattono nel lavandino”
                arrivando in cucina direttamente dal mare, a poche ore dalla cattura.
                E' questo è il vero colpo di fulmine, quel pesce vivo, pescato nelle acque meravigliose di Ponza, la bellezza dei luoghi, ritrovare il suo dialetto, gli fanno dire che è qui che si vuole fermare...",
                'email' =>  'gambericapperi@gmail.com',
                'password' =>    'Gigione127',
                'address' => 'Via Chiaia di Luna - Ponza (LT)',
                'phone' => '077180128',
                'website' => 'gamberiecapperi.it',
                'p_iva' =>  '02959435471',
                'img' => '/veg.jpg',
                'delivery_price' =>  2, 50,
            ],
            [
                'name' => 'Il porticciolo',
                'description' => "Il ristorante Il Porticciolo è aperto dal 1980 ed è situato nella piazzetta principale dell’isola di Ponza una delle più belle isole del Mediterraneo. Il pesce fresco e locale è l’insostituibile protagonista delle ricette  del menù, sempre ricco di novità e gusto.",
                'email' =>  'ilporticcioloponza@gmail.it',
                'password' =>    'Ponza1980',
                'address' => 'Piazza Carlo Pisacane, 4',
                'phone' => '0771809892',
                'website' => 'http://www.ilporticcioloponza.it/',
                'p_iva' =>  '01902770591',
                'img' => '/il-porticciolo.jpg',
                'delivery_price' =>  1, 50,
            ],
            [
                'name' => 'Ristorante Chiaia di Luna',
                'description' => "Cenare sulla terrazza a bordo piscina con la splendida vista della Baia e del Porto di Ponza, illuminati dalla luce soffusa delle candele. Perché anche l’occhio vuole la sua parte.
                La posizione fantastica, la cura nella presentazione dei piatti, il servizio attento e discreto, l’illuminazione, tutto contribuisce a creare un’atmosfera romantica e a fare del Chiaia di Luna uno dei ristoranti più raffinati e ricercati di Ponza.",
                'email' =>  'chiaiadiluna@outlook.it',
                'password' =>    'albertoegio2017',
                'address' => 'via Panoramica',
                'phone' => '0771809821',
                'website' => 'www.hotelchiaiadiluna.com/ristorante-chiaia-di-luna',
                'p_iva' =>  '00930631007',
                'img' => '/terrazza-a-picco-sul.jpg',
                'delivery_price' =>  2, 00,
            ],
            [
                'name' => 'La Baguetteria del Porto',
                'description' => "Nella baguetteria del porto troverai le migliori baguette dell'Isola di Ponza, con i salumi migliori e soprattutto il delizioso pesce fresco appena pescato.",
                'email' => 'baguetteria@delporto.com',
                'password' => 'bellstupanin123',
                'address' => 'Via Banchina Nuova, 23',
                'phone' => '3481628611',
                'website' => '',
                'p_iva' => '00840156007',
                'img' => '/img-20170823-185336-largejpg.jpg',
                'delivery_price' => 1, 50,
            ],
            [
                'name' => 'Pasticceria Gildo',
                'description' => 'La pasticceria migliore di Ponza dal 1989..',
                'email' => 'gildopasticceria@gmail.org',
                'password' => 'bellstugelat1989',
                'address' => 'Via Carlo Pisacane, 13',
                'phone' => '',
                'website' => '',
                'p_iva' => '00856035400',
                'img' => '/se-a-ponza-vai-di-gildo.jpg',
                'delivery_price' => 1, 50,
            ],
            [
                'name' => 'Bar Gelateria Panoramica',
                'description' => "La gelateria nasce nel cuore del centro storico di Ponza nel 1947 prendendo il nome dalla figlia del primo proprietario e fondatore. Dopo pochi anni Giovanni Gigietti, capostipite della famiglia, rilevò l’attività e grazie alla sua fervida fantasia basandosi sui pochi ingredienti presenti allora realizzò una vasta gamma di gusti di qualità, ancora realizzati nei nostri punti vendita.",
                'email' => 'info@gelateriapanoramica.com',
                'password' => 'Giorgioponzesi1956',
                'address' => 'Via Dante Alighieri',
                'phone' => '',
                'website' => '',
                'p_iva' => '00565051900',
                'img' => '/img-20170823-185336-largejpg.jpg',
                'delivery_price' => 2, 50,
            ],
        ];

        foreach ($restaurants as $restaurant) {
            User::create([
                'name' => $restaurant['name'],
                'description' => $restaurant['description'],
                'slug' => Str::of($restaurant['name'])->slug('-'),
                'email' => $restaurant['email'],
                'password' => Hash::make($restaurant['password']),
                'address' => $restaurant['address'],
                'phone' => $restaurant['phone'],
                'website' => $restaurant['website'],
                'p_iva' => $restaurant['p_iva'],
                'img' => $restaurant['img'],
                'delivery_price' => $restaurant['delivery_price'],
            ]);
        }
    }
}
