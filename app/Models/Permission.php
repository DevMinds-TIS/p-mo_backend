<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * 
 * @property int $idpermission
 * @property int|null $iduser
 * @property string|null $teacherpermission
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Permission extends Model
{
	protected $table = 'permissions';
	protected $primaryKey = 'idpermission';

	protected $casts = [
		'iduser' => 'int'
	];

	protected $fillable = [
		'iduser',
		'teacherpermission'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'idpermission');
	}
}
