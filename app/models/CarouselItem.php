<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 14.10.2014
 * Time: 21:42
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class CarouselItem extends Eloquent {
	use SoftDeletingTrait;

	protected $table = "carousel_items";

	protected $primaryKey = "id";

	public $timestamps = false;
	protected $dates = ['deleted_at'];

} 