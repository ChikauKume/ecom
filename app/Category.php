<?php

namespace App;

use App\Subcategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'description','image'
    ];

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
}

