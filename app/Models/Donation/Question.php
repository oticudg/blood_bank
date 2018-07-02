<?php

namespace App\Models\Donation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ModelsTrait;

class Question extends Model
{
	use SoftDeletes, ModelsTrait;

	protected $fillable = ['question', 'sex'];

	protected $hidden = [
		'created_at', 'updated_at', 'deleted_at'
	];
}
