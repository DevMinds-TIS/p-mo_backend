<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinalEvaluation
 * 
 * @property int $idfe
 * @property int|null $idcriteria
 * @property int|null $iduser
 * @property int|null $idteam
 * @property Carbon|null $datefe
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Criterion|null $criterion
 * @property User|null $user
 * @property Team|null $team
 *
 * @package App\Models
 */
class FinalEvaluation extends Model
{
	protected $table = 'final_evaluations';
	protected $primaryKey = 'idfe';

	protected $casts = [
		'idcriteria' => 'int',
		'iduser' => 'int',
		'idteam' => 'int',
		'datefe' => 'datetime'
	];

	protected $fillable = [
		'idcriteria',
		'iduser',
		'idteam',
		'datefe'
	];

	public function criterion()
	{
		return $this->belongsTo(Criterion::class, 'idcriteria');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function team()
	{
		return $this->belongsTo(Team::class, 'idteam');
	}
}
