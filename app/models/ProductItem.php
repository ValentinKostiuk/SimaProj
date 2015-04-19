<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductItem extends Eloquent {
	use SoftDeletingTrait;

	protected $table = "product_items";

	protected $primaryKey = "id";

	protected $dates = ['deleted_at'];

	public function groups()
	{
		// params: relatated_table, pivot_table, key1, key2
		return $this->belongsToMany('ProductGroup', 'product_group', 'product_id', 'group_id');
	}
}