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
 * @property int|null $idac
 * @property int|null $idsprint
 * @property int|null $idstudent
 * @property Carbon|null $datesa
 * 
 * @property AssessmentCriterion|null $assessment_criterion
 * @property Sprint|null $sprint
 * @property Student|null $student
 *
 * @package App\Models
 */
class SelfAssessment extends Model
{
	protected $table = 'self_assessment';
	protected $primaryKey = 'idsa';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idsa' => 'int',
		'idac' => 'int',
		'idsprint' => 'int',
		'idstudent' => 'int',
		'datesa' => 'datetime'
	];

	protected $fillable = [
		'idac',
		'idsprint',
		'idstudent',
		'datesa'
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
		return $this->belongsTo(Student::class, 'idstudent');
	}
}
