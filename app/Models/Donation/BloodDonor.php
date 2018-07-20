<?php

namespace App\Models\Donation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ModelsTrait;

class BloodDonor extends Model
{
	use SoftDeletes, ModelsTrait;

	protected $fillable = [
		'birthdate',
		'blood_group_id',
		'current_occupation',
		'email',
		'last_name',
		'location_home',
		'location_work',
		'name',
		'num_id',
		'observation',
		'phone_home',
		'phone_person',
		'phone_work',
		'place_birthdate',
		'profession',
		'sex',
	];

	protected $hidden = [
		'created_at', 'updated_at', 'deleted_at'
	];

	public function donations()
	{
		return $this->hasMany(Donation::class);
	}

	public function blood_group()
	{
		return $this->belongsTo(BloodGroup::class);
	}
}
