<?php

use App\Product;
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
    }
}
