<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 * 
 * @property int $idteam
 * @property int|null $idspace
 * @property int|null $iduser
 * @property string|null $nameteam
 * @property string|null $companyteam
 * @property string|null $emailteam
 * @property string|null $logoteam
 * @property string|null $repositoryteam
 * @property string|null $localdeployteam
 * @property string|null $externaldeployteam
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Space|null $space
 * @property User|null $user
 * @property Collection|CrossEvaluation[] $cross_evaluations
 * @property Collection|Document[] $documents
 * @property Collection|Planning[] $plannings
 * @property Collection|FinalEvaluation[] $final_evaluations
 * @property Collection|Score[] $scores
 * @property Collection|Tracking[] $trackings
 * @property Collection|TeamMember[] $team_members
 *
 * @package App\Models
 */
class Team extends Model
{
	protected $table = 'teams';
	protected $primaryKey = 'idteam';

	protected $casts = [
		'idspace' => 'int',
		'iduser' => 'int'
	];

	protected $fillable = [
		'idspace',
		'iduser',
		'nameteam',
		'companyteam',
		'emailteam',
		'logoteam',
		'repositoryteam',
		'localdeployteam',
		'externaldeployteam'
	];

	public function space()
	{
		return $this->belongsTo(Space::class, 'idspace');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function cross_evaluations()
	{
		return $this->hasMany(CrossEvaluation::class, 'idteam');
	}

	public function documents()
	{
		return $this->hasMany(Document::class, 'idteam');
	}

	public function plannings()
	{
		return $this->hasMany(Planning::class, 'idteam');
	}

	public function final_evaluations()
	{
		return $this->hasMany(FinalEvaluation::class, 'idteam');
	}

	public function scores()
	{
		return $this->hasMany(Score::class, 'idteam');
	}

	public function trackings()
	{
		return $this->hasMany(Tracking::class, 'idteam');
	}

	public function team_members()
	{
		return $this->hasMany(TeamMember::class, 'idteam');
	}
}
