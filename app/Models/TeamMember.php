<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamMember
 * 
 * @property int $idteammember
 * @property int|null $idteam
 * @property int|null $idrol
 * @property int|null $iduser
 * 
 * @property Team|null $team
 * @property Role|null $role
 * @property User|null $user
 *
 * @package App\Models
 */
class TeamMember extends Model
{
	protected $table = 'team_members';
	protected $primaryKey = 'idteammember';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idteammember' => 'int',
		'idteam' => 'int',
		'idrol' => 'int',
		'iduser' => 'int'
	];

	protected $fillable = [
		'idteam',
		'idrol',
		'iduser'
	];

	public function team()
	{
		return $this->belongsTo(Team::class, 'idteam');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'idrol');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}
}
