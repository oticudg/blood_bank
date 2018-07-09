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
		'interview',
		'question_id',
		'created_at'
	];

	protected $hidden = [
		'updated_at', 'deleted_at'
	];

	public function blood_donor()
	{
		return $this->belongsTo(BloodDonor::class);
	}

	public function question()
	{
		return $this->belongsTo(Question::class);
	}
}
