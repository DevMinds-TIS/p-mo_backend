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
 * @property int|null $iduser
 * @property string|null $nameproject
 * @property string|null $codeproject
 * @property Carbon|null $startproject
 * @property Carbon|null $endproject
 * 
 * @property User|null $user
 * @property Collection|Announcement[] $announcements
 * @property Collection|Space[] $spaces
 * @property Collection|Document[] $documents
 *
 * @package App\Models
 */
class Project extends Model
{
	protected $table = 'projects';
	protected $primaryKey = 'idproject';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idproject' => 'int',
		'iduser' => 'int',
		'startproject' => 'datetime',
		'endproject' => 'datetime'
	];

	protected $fillable = [
		'iduser',
		'nameproject',
		'codeproject',
		'startproject',
		'endproject'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function announcements()
	{
		return $this->hasMany(Announcement::class, 'idproject');
	}

	public function spaces()
	{
		return $this->hasMany(Space::class, 'idproject');
	}

	public function documents()
	{
		return $this->hasMany(Document::class, 'idproject');
	}
}
