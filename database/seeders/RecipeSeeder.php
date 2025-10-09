<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\RecipeStep;
use App\Models\RecipeTip;

class RecipeSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $recipes = [
            [
                'title'    => 'Bolu Lembut',
                'category' => 'Dessert',
                'image'    => 'assets/images/bolu.jpeg',
                'desc'     => 'Resep bolu klasik yang lembut dan harum, cocok untuk segala acara.',
                'time'     => '1 jam',
                'serving'  => '8 porsi',
                'rating'   => 4.6,
                'price'    => 30000,
                'steps'    => [
                    'Panaskan oven pada suhu 180°C.',
                    'Kocok telur dan gula hingga mengembang.',
                    'Masukkan tepung sedikit demi sedikit sambil diaduk perlahan.',
                    'Tuang adonan ke loyang dan panggang 35-40 menit.'
                ],
                'tips'     => [
                    'Gunakan telur suhu ruang agar adonan mengembang sempurna.',
                    'Ayak tepung sebelum digunakan untuk hasil lembut.'
                ]
            ],
            [
                'title'    => 'Brownies Coklat Premium',
                'category' => 'Dessert',
                'image'    => 'assets/images/brownies.jpeg',
                'desc'     => 'Brownies coklat fudgy dengan rasa yang pekat dan tekstur lembut.',
                'time'     => '45 menit',
                'serving'  => '6 porsi',
                'rating'   => 4.8,
                'price'    => 35000,
                'steps'    => [
                    'Lelehkan cokelat dan butter hingga rata.',
                    'Kocok gula dan telur sampai kental.',
                    'Campur adonan cokelat leleh ke kocokan telur.',
                    'Tambahkan tepung dan aduk rata, panggang 30 menit.'
                ],
                'tips'     => [
                    'Jangan overbake agar brownies tetap fudgy.',
                    'Gunakan cokelat berkualitas untuk rasa maksimal.'
                ]
            ],
            [
                'title'    => 'Donat Gula Mantap',
                'category' => 'Dessert',
                'image'    => 'assets/images/donat.jpeg',
                'desc'     => 'Rahasia donat kentang yang super lembut dengan taburan gula halus yang manis.',
                'time'     => '45 menit',
                'serving'  => '3 porsi',
                'rating'   => 4.8,
                'price'    => 40000,
                'steps'    => [
                    'Campur tepung, kentang, gula, ragi, dan susu.',
                    'Uleni hingga kalis elastis.',
                    'Diamkan hingga mengembang 2x lipat.',
                    'Goreng donat hingga golden brown lalu taburi gula.'
                ],
                'tips'     => [
                    'Pastikan ragi aktif agar donat mengembang sempurna.',
                    'Gunakan api sedang saat menggoreng agar matang merata.'
                ]
            ],
            [
                'title'    => 'Cheese Cake Lumer',
                'category' => 'Dessert',
                'image'    => 'assets/images/chesee-cake.jpeg',
                'desc'     => 'Cheese cake lembut dengan rasa keju creamy yang lumer di mulut.',
                'time'     => '1 jam 20 menit',
                'serving'  => '6 porsi',
                'rating'   => 4.9,
                'price'    => 55000,
                'steps'    => [
                    'Siapkan crust biskuit di loyang dan padatkan.',
                    'Campur cream cheese, gula, dan telur hingga lembut.',
                    'Tuang adonan ke crust lalu panggang metode waterbath 50 menit.',
                    'Dinginkan sebelum disajikan agar set sempurna.'
                ],
                'tips'     => [
                    'Gunakan cream cheese berkualitas agar rasa lebih creamy.',
                    'Panggang dengan metode waterbath untuk tekstur lembut.'
                ]
            ],
            [
                'title'    => 'Nastar Keju Spesial',
                'category' => 'Snack',
                'image'    => 'assets/images/nastar-keju.jpeg',
                'desc'     => 'Nastar klasik dengan isian nanas manis dan taburan keju gurih.',
                'time'     => '2 jam',
                'serving'  => '40 pcs',
                'rating'   => 4.7,
                'price'    => 65000,
                'steps'    => [
                    'Masak nanas parut dan gula hingga kering untuk isian.',
                    'Kocok butter, gula, dan telur hingga lembut.',
                    'Masukkan tepung, bentuk bulat dan isi dengan nanas.',
                    'Oven hingga matang dan taburi keju di atasnya.'
                ],
                'tips'     => [
                    'Gunakan nanas segar agar selai lebih harum.',
                    'Taburi keju saat masih panas supaya menempel.'
                ]
            ],
            [
                'title'    => 'Roti Sobek Lembut',
                'category' => 'Snack',
                'image'    => 'assets/images/roti-sobek.jpeg',
                'desc'     => 'Roti sobek empuk dengan aroma butter yang menggoda.',
                'time'     => '2 jam',
                'serving'  => '10 porsi',
                'rating'   => 4.6,
                'price'    => 45000,
                'steps'    => [
                    'Campur tepung, ragi, gula, susu, dan butter.',
                    'Uleni hingga kalis elastis, lalu diamkan 1 jam.',
                    'Bentuk adonan, letakkan di loyang, diamkan lagi 30 menit.',
                    'Panggang 20-25 menit hingga matang keemasan.'
                ],
                'tips'     => [
                    'Gunakan tepung protein tinggi agar roti empuk.',
                    'Oles permukaan dengan butter setelah dipanggang agar shiny.'
                ]
            ],
            [
                'title'    => 'Tiramisu Enak',
                'category' => 'Dessert',
                'image'    => 'assets/images/tiramisu.jpeg',
                'desc'     => 'Resep tiramisu ala Italia dengan lapisan krim mascarpone dan taburan kakao.',
                'time'     => '30 menit',
                'serving'  => '5 porsi',
                'rating'   => 4.7,
                'price'    => 25000,
                'steps'    => [
                    'Celupkan lady finger ke kopi dan tata di dasar wadah.',
                    'Campur mascarpone, gula, dan whipped cream hingga lembut.',
                    'Lapisi lady finger dengan krim mascarpone.',
                    'Taburi kakao bubuk di atasnya dan simpan di kulkas.'
                ],
                'tips'     => [
                    'Gunakan kopi espresso agar rasa lebih pekat.',
                    'Dinginkan minimal 4 jam agar tiramisu set sempurna.'
                ]
            ],
        ];

        foreach ($recipes as $data) {
            $recipe = Recipe::create([
                'title'    => $data['title'],
                'category' => $data['category'],
                'image'    => $data['image'],
                'desc'     => $data['desc'],
                'time'     => $data['time'],
                'serving'  => $data['serving'],
                'rating'   => $data['rating'],
                'price'    => $data['price'],
            ]);

            // Tambah steps
            foreach ($data['steps'] as $i => $step) {
                RecipeStep::create([
                    'recipe_id'   => $recipe->id,
                    'step_number' => $i + 1,
                    'description' => $step,
                ]);
            }

            // Tambah tips
            foreach ($data['tips'] as $tip) {
                RecipeTip::create([
                    'recipe_id' => $recipe->id,
                    'tip'       => $tip,
                ]);
            }
        }
    }
}
