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
		'donation_id',
		'question_id',
	];

	protected $hidden = [
		'created_at', 'updated_at', 'deleted_at'
	];

	public function donation()
	{
		return $this->belongsTo(Donation::class);
	}

	public function question()
	{
		return $this->belongsTo(Question::class);
	}
}
