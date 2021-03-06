<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'price',
        'name',
        'description',
        'quantity',
        'picture',
        'category_id',
        'purchases',
        'counter',
        'likes',
        'created_by',
        'show',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Relations
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * Methods
     */
    protected function storeRecord($request)
    {
        $product = new Product();

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = floatval($request->get('price'));
        $product->quantity = intval($request->get('quantity'));
        $product->created_by = auth()->user()->id;
        $product->show = $request->get('show');
        $product->category_id = $request->get('category_id');

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $product->picture = $this->resize(
                config('constants.image.product.width'), 
                config('constants.image.product.height'), 
                $file
            );
        }

        $product->save();

        return $product;
    }

    protected function updateRecord($request, $id)
    {
        $product = $this->find($id);

        if (!$product) {
            return $product;
        }

        $oldImage = $product->picture ?: null;

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = floatval($request->get('price'));
        $product->quantity = intval($request->get('quantity'));
        $product->created_by = auth()->user()->id;
        $product->show = $request->get('show');
        $product->category_id = $request->get('category_id');

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            Storage::delete($oldImage);

            $product->picture = $this->resize(
                config('constants.image.product.width'), 
                config('constants.image.product.height'), 
                $file
            );
        }

        $product->save();

        return $product;
    }

    protected function solds()
    {
        return $this->where('purchases', '>', 0)
            ->get();
    }

    protected function likes()
    {
        return $this->where('likes', '>', 0)
            ->get();
    }

    protected function getProductById($id)
    {
        return $this->where('id', $id)
            ->first();
    }

    protected function getProductsByCategoryId($id)
    {
        return $this->where('category_id', $id)
            ->where('quantity', '>', 0)
            ->where('show', config('constants.status.active'))
            ->latest('updated_at')
            ->get();
    }

    protected function existingProducts()
    {
        return $this->where('quantity', '>', 0)
            ->where('show', config('constants.status.active'))
            ->latest('updated_at')
            ->get();
    }

    protected function searchRecords($search = '')
    {
        $query = $this->where('name', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%');
            
        return $query->latest('updated_at')
            ->paginate(config('constants.pagination'));
    }

    protected function resize($width, $height, $file)
	{
		$image = Image::make($file);
		$image->fit($width, $height);

        $fileName = config('constants.productImages').time().'_'.$file->getClientOriginalName();
        Storage::put($fileName, $image->encode());

        return $fileName;
	}

    protected function deleteRecord($product)
    {
        Storage::delete($product->picture);

        $product->delete();        
    }
}
