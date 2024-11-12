<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleUser
 * 
 * @property int $idroleuser
 * @property int|null $idteammember
 * @property int|null $iduser
 * @property int|null $idrol
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TeamMember|null $team_member
 * @property User|null $user
 * @property Role|null $role
 *
 * @package App\Models
 */
class RoleUser extends Model
{
	protected $table = 'role_user';
	protected $primaryKey = 'idroleuser';

	protected $casts = [
		'idteammember' => 'int',
		'iduser' => 'int',
		'idrol' => 'int'
	];

	protected $fillable = [
		'idteammember',
		'iduser',
		'idrol'
	];

	public function team_member()
	{
		return $this->belongsTo(TeamMember::class, 'idteammember');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'idrol');
	}
}
