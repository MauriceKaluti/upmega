<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [ 'name', 'category_id', 'sub_category_id', 'price', 'description', 'product_details', 'price_badge','price_offer','image','image_alt','status','quantity' ];


    // Defining relationship between categories and products in that one category has many products and one product belongs to certain category
	public function category() {
		//  $this->belongsTo('App\Product');
		return $this->belongsTo( Category::class );
	}

	// Defining relationship between attributes and products in that one product has many attributes
	public function attributes() {
		//  $this->belongsTo('App\Product');
		return $this->hasMany( ProductsAttribute::class, 'product_id' );
	}

	// Defining relationship between attributes and products in that one product has many reviews
	public function reviews() {
		//  $this->belongsTo('App\Product');
		return $this->hasMany( ProductReview::class );
	}


		// Defining relationship between attributes and products in that one product has many reviews
	public function wishes() {
		//  $this->belongsTo('App\Product');
		return $this->hasMany( wishList::class, 'product_id' );
	}

	public function product_group() {
		return $this->belongsTo( ProductGroup::class );
	}


	// public function getStarRating() {
		
	// 	$starCountSum=$this->reviews()->sum('rating');
	// 	$average=$starCountSum / $this->reviews()->count();

	// 	return $average;
	// }
}
