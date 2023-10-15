<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ProductReview extends Model {
	//

	protected $fillable = [
		'title',
		'description',
		'rating',
		'product_id',
		'user_id'
	];

	public function user() {
		return $this->belongsTo( User::class );
	}


	public function product() {
		return $this->belongsTo( Product::class );
	}
}
