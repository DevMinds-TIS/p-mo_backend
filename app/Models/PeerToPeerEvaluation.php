<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeerToPeerEvaluation
 * 
 * @property int $idp2p
 * @property int|null $idac
 * @property int|null $idsprint
 * @property int|null $idstudent_evaluator
 * @property int|null $idstudent_evaluated
 * @property Carbon|null $datep2p
 * 
 * @property AssessmentCriterion|null $assessment_criterion
 * @property Sprint|null $sprint
 * @property Student|null $student
 *
 * @package App\Models
 */
class PeerToPeerEvaluation extends Model
{
	protected $table = 'peer_to_peer_evaluation';
	protected $primaryKey = 'idp2p';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idp2p' => 'int',
		'idac' => 'int',
		'idsprint' => 'int',
		'idstudent_evaluator' => 'int',
		'idstudent_evaluated' => 'int',
		'datep2p' => 'datetime'
	];

	protected $fillable = [
		'idac',
		'idsprint',
		'idstudent_evaluator',
		'idstudent_evaluated',
		'datep2p'
	];

	public function assessment_criterion()
	{
		return $this->belongsTo(AssessmentCriterion::class, 'idac');
	}

	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'idsprint');
	}

	public function student()
	{
		return $this->belongsTo(Student::class, 'idstudent_evaluated');
	}
}
