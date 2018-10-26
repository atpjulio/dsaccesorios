<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name',
    	'created_by'
    ];

    /**
     * Relations
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Methods
     */
    protected function storeRecord($request)
    {
        $category = new Category();

        $category->name = $request->get('name');
        $category->save();

        return $category;
    }

    protected function updateRecord($request, $id)
    {
        $category = $this->find($id);

        if (!$category) {
            return $category;
        }

        $category->name = $request->get('name');
        $category->save();

        return $category;
    }
	    
}
