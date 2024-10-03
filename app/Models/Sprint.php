<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sprint
 * 
 * @property int $idsprint
 * @property int|null $idplanning
 * @property Carbon|null $startsprint
 * @property Carbon|null $endsprint
 * @property string|null $goalsprint
 * 
 * @property Planning|null $planning
 * @property Collection|CrossAssessment[] $cross_assessments
 * @property Collection|PeerToPeerEvaluation[] $peer_to_peer_evaluations
 * @property Collection|SelfAssessment[] $self_assessments
 * @property Collection|SprintTrackingSpreadsheet[] $sprint_tracking_spreadsheets
 * @property Collection|WeeklyEvaSpreadsheet[] $weekly_eva_spreadsheets
 * @property Collection|UserStoriesSpreadsheet[] $user_stories_spreadsheets
 *
 * @package App\Models
 */
class Sprint extends Model
{
	protected $table = 'sprint';
	protected $primaryKey = 'idsprint';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idsprint' => 'int',
		'idplanning' => 'int',
		'startsprint' => 'datetime',
		'endsprint' => 'datetime'
	];

	protected $fillable = [
		'idplanning',
		'startsprint',
		'endsprint',
		'goalsprint'
	];

	public function planning()
	{
		return $this->belongsTo(Planning::class, 'idplanning');
	}

	public function cross_assessments()
	{
		return $this->hasMany(CrossAssessment::class, 'idsprint');
	}

	public function peer_to_peer_evaluations()
	{
		return $this->hasMany(PeerToPeerEvaluation::class, 'idsprint');
	}

	public function self_assessments()
	{
		return $this->hasMany(SelfAssessment::class, 'idsprint');
	}

	public function sprint_tracking_spreadsheets()
	{
		return $this->hasMany(SprintTrackingSpreadsheet::class, 'idsprint');
	}

	public function weekly_eva_spreadsheets()
	{
		return $this->hasMany(WeeklyEvaSpreadsheet::class, 'idsprint');
	}

	public function user_stories_spreadsheets()
	{
		return $this->hasMany(UserStoriesSpreadsheet::class, 'idsprint');
	}
}
