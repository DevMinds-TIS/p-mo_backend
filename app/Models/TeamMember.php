<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamMember
 * 
 * @property int $idteammember
 * @property int|null $idteam
 * @property int|null $iduser
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Team|null $team
 * @property User|null $user
 * @property Collection|RoleUser[] $role_users
 *
 * @package App\Models
 */
class TeamMember extends Model
{
	protected $table = 'team_members';
	protected $primaryKey = 'idteammember';

	protected $casts = [
		'idteam' => 'int',
		'iduser' => 'int'
	];

	protected $fillable = [
		'idteam',
		'iduser'
	];

	public function team()
	{
		return $this->belongsTo(Team::class, 'idteam');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function role_users()
	{
		return $this->hasMany(RoleUser::class, 'idteammember');
	}
}
