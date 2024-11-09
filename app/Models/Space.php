<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Space
 * 
 * @property int $idspace
 * @property int|null $idproject
 * @property int|null $iduser
 * @property string|null $namespace
 * @property Carbon|null $startspace
 * @property Carbon|null $endspace
 * @property int|null $limitspace
 * @property Carbon|null $starregistrationspace
 * @property Carbon|null $endregistrationspace
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Project|null $project
 * @property User|null $user
 * @property Collection|Document[] $documents
 * @property Collection|Siscode[] $siscodes
 * @property Collection|Team[] $teams
 * @property Collection|Announcement[] $announcements
 *
 * @package App\Models
 */
class Space extends Model
{
	protected $table = 'spaces';
	protected $primaryKey = 'idspace';

	protected $casts = [
		'idproject' => 'int',
		'iduser' => 'int',
		'startspace' => 'datetime',
		'endspace' => 'datetime',
		'limitspace' => 'int',
		'starregistrationspace' => 'datetime',
		'endregistrationspace' => 'datetime'
	];

	protected $fillable = [
		'idproject',
		'iduser',
		'namespace',
		'startspace',
		'endspace',
		'limitspace',
		'starregistrationspace',
		'endregistrationspace'
	];

	public function project()
	{
		return $this->belongsTo(Project::class, 'idproject');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function documents()
	{
		return $this->hasMany(Document::class, 'idspace');
	}

	public function siscodes()
	{
		return $this->hasMany(Siscode::class, 'idspace');
	}

	public function teams()
	{
		return $this->hasMany(Team::class, 'idspace');
	}

	public function announcements()
	{
		return $this->hasMany(Announcement::class, 'idspace');
	}
}
