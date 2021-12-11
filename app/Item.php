<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'name',
		'explanation',
		'price',
		'stock',
	];

	protected $table = 'items';

	public function cart() {
		return $this->hasMany('App\Cart');
	}
}
