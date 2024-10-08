<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SelfAssessment
 * 
 * @property int $idsa
 * @property int|null $idcriteria
 * @property int|null $iduser
 * @property Carbon|null $datesa
 * 
 * @property Criterion|null $criterion
 * @property User|null $user
 *
 * @package App\Models
 */
class SelfAssessment extends Model
{
	protected $table = 'self_assessments';
	protected $primaryKey = 'idsa';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idsa' => 'int',
		'idcriteria' => 'int',
		'iduser' => 'int',
		'datesa' => 'datetime'
	];

	protected $fillable = [
		'idcriteria',
		'iduser',
		'datesa'
	];

	public function criterion()
	{
		return $this->belongsTo(Criterion::class, 'idcriteria');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}
}
