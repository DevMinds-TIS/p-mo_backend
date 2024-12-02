<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CrossEvaluation
 * 
 * @property int $idce
 * @property int|null $idplanning
 * @property int|null $idcriteria
 * @property int|null $idteam
 * @property Carbon|null $datece
 * @property string|null $permissionce
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Planning|null $planning
 * @property Criterion|null $criterion
 * @property Team|null $team
 * @property Collection|Score[] $scores
 *
 * @package App\Models
 */
class CrossEvaluation extends Model
{
	protected $table = 'cross_evaluations';
	protected $primaryKey = 'idce';

	protected $casts = [
		'idplanning' => 'int',
		'idcriteria' => 'int',
		'idteam' => 'int',
		'datece' => 'datetime'
	];

	protected $fillable = [
		'idplanning',
		'idcriteria',
		'idteam',
		'datece',
		'permissionce'
	];

	public function planning()
	{
		return $this->belongsTo(Planning::class, 'idplanning');
	}

	public function criterion()
	{
		return $this->belongsTo(Criterion::class, 'idcriteria');
	}

	public function team()
	{
		return $this->belongsTo(Team::class, 'idteam');
	}

	public function scores()
	{
		return $this->hasMany(Score::class, 'idce');
	}
}
