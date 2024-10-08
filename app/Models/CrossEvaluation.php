<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CrossEvaluation
 * 
 * @property int $idce
 * @property int|null $idplanning
 * @property int|null $idcriteria
 * @property Carbon|null $datece
 * 
 * @property Planning|null $planning
 * @property Criterion|null $criterion
 *
 * @package App\Models
 */
class CrossEvaluation extends Model
{
	protected $table = 'cross_evaluations';
	protected $primaryKey = 'idce';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idce' => 'int',
		'idplanning' => 'int',
		'idcriteria' => 'int',
		'datece' => 'datetime'
	];

	protected $fillable = [
		'idplanning',
		'idcriteria',
		'datece'
	];

	public function planning()
	{
		return $this->belongsTo(Planning::class, 'idplanning');
	}

	public function criterion()
	{
		return $this->belongsTo(Criterion::class, 'idcriteria');
	}
}
