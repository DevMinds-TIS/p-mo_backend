<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Planning
 * 
 * @property int $idplanning
 * @property int|null $idteam
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Team|null $team
 * @property Collection|CrossEvaluation[] $cross_evaluations
 * @property Collection|Document[] $documents
 * @property Collection|SelfAssessment[] $self_assessments
 * @property Collection|Sprint[] $sprints
 *
 * @package App\Models
 */
class Planning extends Model
{
	protected $table = 'planning';
	protected $primaryKey = 'idplanning';

	protected $casts = [
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

	public function self_assessments()
	{
		return $this->hasMany(SelfAssessment::class, 'idplanning');
	}

	public function sprints()
	{
		return $this->hasMany(Sprint::class, 'idplanning');
	}
}
