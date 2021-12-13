<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Authenticatable
{
    use Notifiable;
	use SoftDeletes;
	protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'postal_code',
		'pre_name',
		'city_name',
		'block_name',
		'tel_number',
    ];
}

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
