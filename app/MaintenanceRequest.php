<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
	const TYPES = [
		'Gate maintenance' => 'gm',
		'Street light maintenance' => 'sm',
		'Water issue' => 'wi',
		'Other' => 'ot',
	];

	const STATUSES = [
		'New' => 'new',
		'Quoted' => 'quoted',
		'Invoiced' => 'invoiced',
		'Resolved' => 'resolved',
		'Allocated' => 'allocated',
	];

	protected $casts = [
		'contractors' => 'array',
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
