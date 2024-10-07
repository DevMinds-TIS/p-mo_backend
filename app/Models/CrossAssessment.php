<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CrossAssessment
 * 
 * @property int $idca
 * @property int|null $idac
 * @property int|null $idplanning
 * @property int|null $idevaluation_team
 * @property int|null $idevaluated_team
 * @property Carbon|null $dateca
 * 
 * @property AssessmentCriterion|null $assessment_criterion
 * @property Planning|null $planning
 * @property Team|null $team
 *
 * @package App\Models
 */
class CrossAssessment extends Model
{
	protected $table = 'cross_assessment';
	protected $primaryKey = 'idca';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idca' => 'int',
		'idac' => 'int',
		'idplanning' => 'int',
		'idevaluation_team' => 'int',
		'idevaluated_team' => 'int',
		'dateca' => 'datetime'
	];

	protected $fillable = [
		'idac',
		'idplanning',
		'idevaluation_team',
		'idevaluated_team',
		'dateca'
	];

	public function assessment_criterion()
	{
		return $this->belongsTo(AssessmentCriterion::class, 'idac');
	}

	public function planning()
	{
		return $this->belongsTo(Planning::class, 'idplanning');
	}

	public function team()
	{
		return $this->belongsTo(Team::class, 'idevaluated_team');
	}
}
