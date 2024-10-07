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
 * @property string|null $partaplanning
 * @property string|null $partbplanning
 * @property string|null $contractplanning
 * @property string|null $paymentplanning
 * 
 * @property Team|null $team
 * @property Collection|CrossAssessment[] $cross_assessments
 * @property Collection|Team[] $teams
 * @property Collection|PeerToPeerEvaluation[] $peer_to_peer_evaluations
 * @property Collection|SelfAssessment[] $self_assessments
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
		'idteam',
		'partaplanning',
		'partbplanning',
		'contractplanning',
		'paymentplanning'
	];

	public function team()
	{
		return $this->belongsTo(Team::class, 'idteam');
	}

	public function cross_assessments()
	{
		return $this->hasMany(CrossAssessment::class, 'idplanning');
	}

	public function teams()
	{
		return $this->hasMany(Team::class, 'idplanning');
	}

	public function peer_to_peer_evaluations()
	{
		return $this->hasMany(PeerToPeerEvaluation::class, 'idplanning');
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
