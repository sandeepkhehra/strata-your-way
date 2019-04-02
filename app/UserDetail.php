<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
	protected $casts = [
        'details' => 'object',
	];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
}
