<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ArticleItem extends Eloquent {
	use SoftDeletingTrait;

	protected $table = "articles";

	protected $primaryKey = "id";

	public $timestamps = false;
	protected $dates = ['deleted_at'];

}