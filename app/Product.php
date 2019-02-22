<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

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
            $fileName = time().'_'.$file->getClientOriginalName();
            $product->picture = Storage::put(config('constants.productImage'), $file);
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
            $fileName = time().'_'.$file->getClientOriginalName();

            Storage::delete($oldImage);

            $product->picture = Storage::put(config('constants.productImage'), $file);
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
            ->get();
    }

    protected function searchRecords($search = '')
    {
        $query = $this->where('name', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%');
            
        return $query->orderBy('name', 'DESC')
            ->paginate(config('constants.pagination'));
    }

}
