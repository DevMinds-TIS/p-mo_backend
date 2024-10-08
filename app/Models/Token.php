<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Token
 * 
 * @property int $idtoken
 * @property int|null $iduser
 * @property string|null $teachertoken
 * 
 * @property User|null $user
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Token extends Model
{
	protected $table = 'tokens';
	protected $primaryKey = 'idtoken';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idtoken' => 'int',
		'iduser' => 'int'
	];

	protected $hidden = [
		'idtoken',
		'teachertoken'
	];

	protected $fillable = [
		'iduser',
		'teachertoken'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'idtoken');
	}
}
