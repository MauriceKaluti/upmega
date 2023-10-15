<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    	protected $fillable=['name','description','slug','status','image_big','image_small'];

    // Defining relationship between categories and products in that one category has many products and product belongs to certain category

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

      public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
