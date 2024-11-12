<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $idrol
 * @property string|null $namerol
 * @property string|null $iconrol
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'idrol';

	protected $fillable = [
		'namerol',
		'iconrol'
	];

	public function users()
	{
		return $this->belongsToMany(User::class, 'role_user', 'idrol', 'iduser')
					->withPivot('idroleuser', 'idteammember')
					->withTimestamps();
	}
}
