<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'category_id', 'name'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function updateSubcategory($id,$data){
        $data['category_id'] = $data['category'];
        $subcategory = Subcategory::find($id);
        return $subcategory->fill($data)->save();
    }   

    public function remove($id){
        $subcategory = Subcategory::find($id);
        return $subcategory->delete();
    }
}
