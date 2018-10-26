<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
    }
}
