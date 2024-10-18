<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Siscode
 * 
 * @property int $idsiscode
 * @property int|null $idspace
 * @property int|null $iduser
 * @property string|null $siscode
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Space|null $space
 * @property User|null $user
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Siscode extends Model
{
	protected $table = 'siscode';
	protected $primaryKey = 'idsiscode';

	protected $casts = [
		'idspace' => 'int',
		'iduser' => 'int'
	];

	protected $fillable = [
		'idspace',
		'iduser',
		'siscode'
	];

	public function space()
	{
		return $this->belongsTo(Space::class, 'idspace');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'idsiscode');
	}
}
