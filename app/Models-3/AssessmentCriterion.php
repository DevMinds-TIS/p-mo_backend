<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AssessmentCriterion
 * 
 * @property int $idac
 * @property string|null $nameac
 * @property int|null $scoreac
 * @property string|null $commetnac
 * 
 * @property Collection|CrossAssessment[] $cross_assessments
 * @property Collection|PeerToPeerEvaluation[] $peer_to_peer_evaluations
 * @property Collection|SelfAssessment[] $self_assessments
 *
 * @package App\Models
 */
class AssessmentCriterion extends Model
{
	protected $table = 'assessment_criteria';
	protected $primaryKey = 'idac';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idac' => 'int',
		'scoreac' => 'int'
	];

	protected $fillable = [
		'nameac',
		'scoreac',
		'commetnac'
	];

	public function cross_assessments()
	{
		return $this->hasMany(CrossAssessment::class, 'idac');
	}

	public function peer_to_peer_evaluations()
	{
		return $this->hasMany(PeerToPeerEvaluation::class, 'idac');
	}

	public function self_assessments()
	{
		return $this->hasMany(SelfAssessment::class, 'idac');
	}
}
