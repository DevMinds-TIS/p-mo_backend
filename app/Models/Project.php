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
 * @property string|null $termproject
 * @property Carbon|null $startproject
 * @property Carbon|null $endproject
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property Collection|Document[] $documents
 * @property Collection|Announcement[] $announcements
 * @property Collection|Space[] $spaces
 *
 * @package App\Models
 */
class Project extends Model
{
	protected $table = 'projects';
	protected $primaryKey = 'idproject';

	protected $casts = [
		'iduser' => 'int',
		'startproject' => 'datetime',
		'endproject' => 'datetime'
	];

	protected $fillable = [
		'iduser',
		'nameproject',
		'codeproject',
		'termproject',
		'startproject',
		'endproject'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function documents()
	{
		return $this->hasMany(Document::class, 'idproject');
	}

	public function announcements()
	{
		return $this->hasMany(Announcement::class, 'idproject');
	}

	public function spaces()
	{
		return $this->hasMany(Space::class, 'idproject');
	}
}
