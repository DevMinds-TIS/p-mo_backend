<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * 
 * @property int $idadmin
 * @property string|null $nameadmin
 * @property string|null $lastnameadmin
 * @property string|null $emailadmin
 * @property string|null $passwdadmin
 * @property string|null $profileadmin
 * 
 * @property Collection|Project[] $projects
 * @property Collection|Teacher[] $teachers
 *
 * @package App\Models
 */
class Admin extends Model
{
	protected $table = 'admin';
	protected $primaryKey = 'idadmin';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idadmin' => 'int'
	];

	protected $fillable = [
		'nameadmin',
		'lastnameadmin',
		'emailadmin',
		'passwdadmin',
		'profileadmin'
	];

	public function projects()
	{
		return $this->hasMany(Project::class, 'idadmin');
	}

	public function teachers()
	{
		return $this->hasMany(Teacher::class, 'idadmin');
	}
}
