<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Score
 * 
 * @property int $idscore
 * @property int|null $idtask
 * @property int|null $idce
 * @property int|null $idsa
 * @property int|null $idpe
 * @property int|null $idteam
 * @property int|null $iduser
 * @property int|null $idsprint
 * @property int|null $idtracking
 * @property int|null $idweeklie
 * @property int|null $pointscore
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Task|null $task
 * @property CrossEvaluation|null $cross_evaluation
 * @property SelfAssessment|null $self_assessment
 * @property PeerEvaluation|null $peer_evaluation
 * @property Team|null $team
 * @property User|null $user
 * @property Sprint|null $sprint
 * @property Tracking|null $tracking
 * @property Weekly|null $weekly
 *
 * @package App\Models
 */
class Score extends Model
{
	protected $table = 'score';
	protected $primaryKey = 'idscore';

	protected $casts = [
		'idtask' => 'int',
		'idce' => 'int',
		'idsa' => 'int',
		'idpe' => 'int',
		'idteam' => 'int',
		'iduser' => 'int',
		'idsprint' => 'int',
		'idtracking' => 'int',
		'idweeklie' => 'int',
		'pointscore' => 'int'
	];

	protected $fillable = [
		'idtask',
		'idce',
		'idsa',
		'idpe',
		'idteam',
		'iduser',
		'idsprint',
		'idtracking',
		'idweeklie',
		'pointscore'
	];

	public function task()
	{
		return $this->belongsTo(Task::class, 'idtask');
	}

	public function cross_evaluation()
	{
		return $this->belongsTo(CrossEvaluation::class, 'idce');
	}

	public function self_assessment()
	{
		return $this->belongsTo(SelfAssessment::class, 'idsa');
	}

	public function peer_evaluation()
	{
		return $this->belongsTo(PeerEvaluation::class, 'idpe');
	}

	public function team()
	{
		return $this->belongsTo(Team::class, 'idteam');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'idsprint');
	}

	public function tracking()
	{
		return $this->belongsTo(Tracking::class, 'idtracking');
	}

	public function weekly()
	{
		return $this->belongsTo(Weekly::class, 'idweeklie');
	}
}
