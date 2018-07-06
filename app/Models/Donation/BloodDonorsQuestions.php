<?php

namespace App\Models\Donation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ModelsTrait;

class BloodDonorsQuestions extends Model
{
	use SoftDeletes, ModelsTrait;

	protected $fillable = [
		'answer',
		'blood_donor_id',
		'question',
		'question_id',
	];

	protected $hidden = [
		'created_at', 'updated_at', 'deleted_at'
	];
}
