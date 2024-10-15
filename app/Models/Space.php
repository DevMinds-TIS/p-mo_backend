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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Project|null $project
 * @property Collection|Document[] $documents
 * @property Collection|Siscode[] $siscodes
 * @property Collection|Announcement[] $announcements
 * @property Collection|Team[] $teams
 *
 * @package App\Models
 */
class Space extends Model
{
	protected $table = 'spaces';
	protected $primaryKey = 'idspace';

	protected $casts = [
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

	public function documents()
	{
		return $this->hasMany(Document::class, 'idspace');
	}

	public function siscodes()
	{
		return $this->hasMany(Siscode::class, 'idspace');
	}

	public function announcements()
	{
		return $this->hasMany(Announcement::class, 'idspace');
	}

	public function teams()
	{
		return $this->hasMany(Team::class, 'idspace');
	}
}
