<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Planning
 * 
 * @property int $idplanning
 * @property int|null $idteam
 * 
 * @property Team|null $team
 * @property Collection|CrossEvaluation[] $cross_evaluations
 * @property Collection|Document[] $documents
 * @property Collection|Sprint[] $sprints
 *
 * @package App\Models
 */
class Planning extends Model
{
	protected $table = 'planning';
	protected $primaryKey = 'idplanning';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idplanning' => 'int',
		'idteam' => 'int'
	];

	protected $fillable = [
		'idteam'
	];

	public function team()
	{
		return $this->belongsTo(Team::class, 'idteam');
	}

	public function cross_evaluations()
	{
		return $this->hasMany(CrossEvaluation::class, 'idplanning');
	}

	public function documents()
	{
		return $this->hasMany(Document::class, 'idplanning');
	}

	public function sprints()
	{
		return $this->hasMany(Sprint::class, 'idplanning');
	}
}
