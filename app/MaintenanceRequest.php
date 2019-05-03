<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
	const TYPES = [
		'Gate maintenance' => 'gm',
		'Street light maintenance' => 'sm',
		'Water' => 'wi',
		'Other' => 'ot',
	];

	const STATUSES = [
		'New' => 'new',
		'Allocated' => 'allocated',
		'Quoted' => 'quoted',
		'Invoiced' => 'invoiced',
		'Resolved' => 'resolved',
	];

	protected $casts = [
		'contractors' => 'array',
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
