<?php

use App\Category;
use App\Product;
use App\SliderImage;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Lazos'],
            ['name' => 'Vinchas'],
            ['name' => 'Cintillos'],
            ['name' => 'Carteras'],
            ['name' => 'Sandalias'],
            ['name' => 'Maricaditas'],
        ];

        foreach ($data as $value) {
            Category::insert($value);
        }
        $initialProducts = [
            [
                'price' => 20000,
                'name' => 'Lentes para la nieve',
                'description' => 'Lentes para la nieve cuando salgas a esquiar en cualquier rincón de Barranquilla',
                'quantity' => 4,
                'picture' => config('constants.productImages').'test1.jpg',
                'category_id' => 6,
            ],
            [
                'price' => 120000,
                'name' => 'Reloj manilla para dama',
                'description' => 'Reloj espectacular para dama, sirve para momentos especiales donde necesitas saber la hora',
                'quantity' => 13,
                'picture' => config('constants.productImages').'test2.jpg',
                'category_id' => 6,
            ],
        ];

        foreach ($initialProducts as $product) {
            Product::create($product);
        }
         $data = [
            [
                'text' => 'Nueva Colección',
                'url' => config('constants.sliderImages').'foto.png',
                'status' => config('constants.status.active'),
            ],
            [
                'url' => config('constants.sliderImages').'cartera1.jpg',
                'status' => config('constants.status.active'),
            ],
            [
                'url' => config('constants.sliderImages').'cartera2.jpg',
                'status' => config('constants.status.active'),
            ],

        ];

        foreach ($data as $value) {
            SliderImage::insert($value);
        }
    }
}
