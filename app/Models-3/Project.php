<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * 
 * @property int $idproject
 * @property int|null $idadmin
 * @property string|null $nameproject
 * @property string|null $codeproject
 * @property string|null $invitationproject
 * @property string|null $specificationproject
 * @property Carbon|null $startproject
 * @property Carbon|null $endproject
 * 
 * @property Admin|null $admin
 * @property Collection|Space[] $spaces
 * @property Collection|Announcement[] $announcements
 *
 * @package App\Models
 */
class Project extends Model
{
	protected $table = 'project';
	protected $primaryKey = 'idproject';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idproject' => 'int',
		'idadmin' => 'int',
		'startproject' => 'datetime',
		'endproject' => 'datetime'
	];

	protected $fillable = [
		'idadmin',
		'nameproject',
		'codeproject',
		'invitationproject',
		'specificationproject',
		'startproject',
		'endproject'
	];

	public function admin()
	{
		return $this->belongsTo(Admin::class, 'idadmin');
	}

	public function spaces()
	{
		return $this->hasMany(Space::class, 'idproject');
	}

	public function announcements()
	{
		return $this->hasMany(Announcement::class, 'idproject');
	}
}
