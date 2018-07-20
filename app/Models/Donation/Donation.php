<?php

namespace App\Models\Donation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ModelsTrait;

class Donation extends Model
{
	use SoftDeletes, ModelsTrait;

	protected $fillable = [
		'blood_donor_id',
		'blood_group_id',
		'blood_pressure',
		'height',
		// 'interview',
		'location',
		'name_patient',
		'observation',
		'pulse',
		// 'responsible_extraction_donor_id',
		// 'responsible_laboratory_id',
		'recorder',
		'serial',
		'recorder_id',
		'temperature',
		'type_donation_id',
		'weight'
	];

	protected $hidden = [
		'created_at', 'updated_at', 'deleted_at'
	];

	public function blood_group()
	{
		return $this->belongsTo(BloodGroup::class);
	}

	public function blood_donor()
	{
		return $this->belongsTo(BloodDonor::class);
	}

	public function recorder()
	{
		return $this->belongsTo(\App\User::class);
	}

	public function type_donation()
	{
		return $this->belongsTo(TypeDonation::class);
	}
}
