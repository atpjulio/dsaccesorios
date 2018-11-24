<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    protected $fillable = [
    	'text',
    	'url',
    	'status',
        'position'
    ];

    /**
     * Methods
     */

    protected function onlyVisibleImages()
    {
    	return $this->where('status', config('constants.status.active'))
            ->orderBy('position')
    		->get();
    }

    protected function storeRecord($fileName, $text)
    {
    	$sliderImage = new SliderImage();

    	$sliderImage->url = config('constants.sliderImages').$fileName;
    	$sliderImage->text = $text;
    	$sliderImage->status = config('constants.status.active');

    	$sliderImage->save();

    	return $sliderImage;
    }

    protected function updateText($id, $text)
    {
        $sliderImage = $this::find($id);

        if ($sliderImage) {
            $sliderImage->update([
                'text' => $text
            ]); 
        }

        return $sliderImage;
    }

    protected function updatePosition($id, $position)
    {
        $sliderImage = $this::find($id);

        if ($sliderImage) {
            $sliderImage->update([
                'position' => $position
            ]); 
        }

        return $sliderImage;
    }

    protected function updateStatus($id, $status)
    {
        $sliderImage = $this::find($id);

        if ($sliderImage) {
            $sliderImage->update([
                'status' => $status
            ]); 
        }

        return $sliderImage;
    }

}
