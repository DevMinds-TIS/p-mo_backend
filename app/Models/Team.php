<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

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
 * 
 * @property Space|null $space
 * @property Collection|Planning[] $plannings
 * @property Collection|TeamMember[] $team_members
 *
 * @package App\Models
 */
class Team extends Model
{
	protected $table = 'teams';
	protected $primaryKey = 'idteam';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idteam' => 'int',
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

	public function plannings()
	{
		return $this->hasMany(Planning::class, 'idteam');
	}

	public function team_members()
	{
		return $this->hasMany(TeamMember::class, 'idteam');
	}
}
