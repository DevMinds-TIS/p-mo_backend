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
 * @property string|null $namespace
 * @property Carbon|null $startspace
 * @property Carbon|null $endspace
 * @property Carbon|null $starregistrationspace
 * @property Carbon|null $endregistrationspace
 * 
 * @property Project|null $project
 * @property Collection|Announcement[] $announcements
 * @property Collection|Document[] $documents
 * @property Collection|Team[] $teams
 * @property Collection|Siscode[] $siscodes
 *
 * @package App\Models
 */
class Space extends Model
{
	protected $table = 'spaces';
	protected $primaryKey = 'idspace';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idspace' => 'int',
		'idproject' => 'int',
		'startspace' => 'datetime',
		'endspace' => 'datetime',
		'starregistrationspace' => 'datetime',
		'endregistrationspace' => 'datetime'
	];

	protected $fillable = [
		'idproject',
		'namespace',
		'startspace',
		'endspace',
		'starregistrationspace',
		'endregistrationspace'
	];

	public function project()
	{
		return $this->belongsTo(Project::class, 'idproject');
	}

	public function announcements()
	{
		return $this->hasMany(Announcement::class, 'idspace');
	}

	public function documents()
	{
		return $this->hasMany(Document::class, 'idspace');
	}

	public function teams()
	{
		return $this->hasMany(Team::class, 'idspace');
	}

	public function siscodes()
	{
		return $this->hasMany(Siscode::class, 'idspace');
	}
}
