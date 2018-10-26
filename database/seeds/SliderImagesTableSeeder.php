<?php

use App\SliderImage;
use Illuminate\Database\Seeder;

class SliderImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
