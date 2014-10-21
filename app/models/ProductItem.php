<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductItem extends Eloquent {
	use SoftDeletingTrait;

	protected $table = "product_items";

	protected $primaryKey = "id";

	protected $dates = ['deleted_at'];
}