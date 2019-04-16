<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInviteToken extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'community_id', 'user_ids', 'token',
	];

	protected $casts = [
        'user_ids' => 'array',
	];
}
