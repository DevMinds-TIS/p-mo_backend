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
 * @property int|null $idplanning
 * @property Carbon|null $datesa
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Criterion|null $criterion
 * @property User|null $user
 * @property Planning|null $planning
 *
 * @package App\Models
 */
class SelfAssessment extends Model
{
	protected $table = 'self_assessments';
	protected $primaryKey = 'idsa';

	protected $casts = [
		'idcriteria' => 'int',
		'iduser' => 'int',
		'idplanning' => 'int',
		'datesa' => 'datetime'
	];

	protected $fillable = [
		'idcriteria',
		'iduser',
		'idplanning',
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

	public function planning()
	{
		return $this->belongsTo(Planning::class, 'idplanning');
	}
}
