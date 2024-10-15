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
 * @property string|null $nameteam
 * @property string|null $companyteam
 * @property string|null $emailteam
 * @property string|null $logoteam
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Space|null $space
 * @property Collection|CrossEvaluation[] $cross_evaluations
 * @property Collection|Planning[] $plannings
 * @property Collection|TeamMember[] $team_members
 *
 * @package App\Models
 */
class Team extends Model
{
	protected $table = 'teams';
	protected $primaryKey = 'idteam';

	protected $casts = [
		'idspace' => 'int'
	];

	protected $fillable = [
		'idspace',
		'nameteam',
		'companyteam',
		'emailteam',
		'logoteam'
	];

	public function space()
	{
		return $this->belongsTo(Space::class, 'idspace');
	}

	public function cross_evaluations()
	{
		return $this->hasMany(CrossEvaluation::class, 'idteam');
	}

	public function plannings()
	{
		return $this->hasMany(Planning::class, 'idteam');
	}

	public function team_members()
	{
		return $this->hasMany(TeamMember::class, 'idteam');
	}
}
