<?php

class ProductGroup extends Eloquent{

	protected $table = "product_groups";

	protected $primaryKey = "id";

	public function products()
	{
		// params: relatated_table, pivot_table, key1, key2
		return $this->belongsToMany('ProductItem', 'product_group', 'group_id', 'product_id');
	}
}