<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $idrol
 * @property string|null $namerol
 * 
 * @property Collection|User[] $users
 * @property Collection|TeamMember[] $team_members
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'idrol';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idrol' => 'int'
	];

	protected $fillable = [
		'namerol'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'idrol');
	}

	public function team_members()
	{
		return $this->hasMany(TeamMember::class, 'idrol');
	}
}
