<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Criterion
 * 
 * @property int $idcriteria
 * @property string|null $namecriteria
 * @property int|null $scorecriteria
 * @property string|null $commentcriteria
 * 
 * @property Collection|CrossEvaluation[] $cross_evaluations
 * @property Collection|PeerEvaluation[] $peer_evaluations
 * @property Collection|SelfAssessment[] $self_assessments
 *
 * @package App\Models
 */
class Criterion extends Model
{
	protected $table = 'criteria';
	protected $primaryKey = 'idcriteria';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idcriteria' => 'int',
		'scorecriteria' => 'int'
	];

	protected $fillable = [
		'namecriteria',
		'scorecriteria',
		'commentcriteria'
	];

	public function cross_evaluations()
	{
		return $this->hasMany(CrossEvaluation::class, 'idcriteria');
	}

	public function peer_evaluations()
	{
		return $this->hasMany(PeerEvaluation::class, 'idcriteria');
	}

	public function self_assessments()
	{
		return $this->hasMany(SelfAssessment::class, 'idcriteria');
	}
}
