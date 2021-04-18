<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'description',
        'price',
        'image',
        'additional_info',
        'category_id',
        'subcategory_id'
    ];

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function store($data,$image){
        $data['category_id'] = $data['category'];
        $data['subcategory_id'] = $data['subcategory'];
        $data['image'] = $image;
        return Product::create($data);
    }

}
