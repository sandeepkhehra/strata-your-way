<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
	const DOC_TYPES = [
		'Financial statements' => 'fs',
		'Management Committee minutes' => 'mc',
		'AGM minutes' => 'am',
		'Plans/By-Laws/Owners Guide' => 'pg',
		'Audit reports' => 'ar',
		'Insurance renewal documents' => 'id',
		'Maintenance invoices' => 'mi',
		'Utility invoices' => 'ui',
		'Other invoices' => 'oi',
	];

    protected $casts = [
        'details' => 'object',
        'users' => 'array',
        'documents' => 'array',
	];

	protected $fillable = [
		'name', 'email',  'details', 'users',
	];

	public function user()
	{
		return $this->hasOne('App\User');
	}
}
