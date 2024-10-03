<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Teacher
 * 
 * @property int $idteacher
 * @property int|null $idadmin
 * @property string|null $nameteacher
 * @property string|null $lastnameteacher
 * @property string|null $emailteacher
 * @property string|null $passwdteacher
 * @property string|null $profileteacher
 * @property string|null $tokenteacher
 * 
 * @property Admin|null $admin
 * @property Collection|Space[] $spaces
 * @property Collection|Student[] $students
 * @property Collection|Notification[] $notifications
 *
 * @package App\Models
 */
class Teacher extends Model
{
	protected $table = 'teacher';
	protected $primaryKey = 'idteacher';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idteacher' => 'int',
		'idadmin' => 'int'
	];

	protected $fillable = [
		'idadmin',
		'nameteacher',
		'lastnameteacher',
		'emailteacher',
		'passwdteacher',
		'profileteacher',
		'tokenteacher'
	];

	public function admin()
	{
		return $this->belongsTo(Admin::class, 'idadmin');
	}

	public function spaces()
	{
		return $this->hasMany(Space::class, 'idteacher');
	}

	public function students()
	{
		return $this->hasMany(Student::class, 'idteacher');
	}

	public function notifications()
	{
		return $this->hasMany(Notification::class, 'idteacher');
	}
}
