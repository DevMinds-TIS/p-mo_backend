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
 * @property int|null $idteacher
 * @property Carbon|null $startspace
 * @property Carbon|null $endspace
 * @property Carbon|null $startregistrationspace
 * @property Carbon|null $endregistrationspace
 * @property string|null $studentlistspace
 * 
 * @property Project|null $project
 * @property Teacher|null $teacher
 * @property Collection|Announcement[] $announcements
 * @property Collection|Team[] $teams
 *
 * @package App\Models
 */
class Space extends Model
{
	protected $table = 'space';
	protected $primaryKey = 'idspace';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idspace' => 'int',
		'idproject' => 'int',
		'idteacher' => 'int',
		'startspace' => 'datetime',
		'endspace' => 'datetime',
		'startregistrationspace' => 'datetime',
		'endregistrationspace' => 'datetime'
	];

	protected $fillable = [
		'idproject',
		'idteacher',
		'startspace',
		'endspace',
		'startregistrationspace',
		'endregistrationspace',
		'studentlistspace'
	];

	public function project()
	{
		return $this->belongsTo(Project::class, 'idproject');
	}

	public function teacher()
	{
		return $this->belongsTo(Teacher::class, 'idteacher');
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
