<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Document
 * 
 * @property int $iddocument
 * @property int|null $idproject
 * @property int|null $idspace
 * @property int|null $idplanning
 * @property int|null $idtracking
 * @property int|null $idstorie
 * @property int|null $idtask
 * @property int|null $idteam
 * @property string|null $namedocument
 * @property string|null $pathdocument
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Project|null $project
 * @property Space|null $space
 * @property Planning|null $planning
 * @property Tracking|null $tracking
 * @property Story|null $story
 * @property Task|null $task
 * @property Team|null $team
 *
 * @package App\Models
 */
class Document extends Model
{
	protected $table = 'documents';
	protected $primaryKey = 'iddocument';

	protected $casts = [
		'idproject' => 'int',
		'idspace' => 'int',
		'idplanning' => 'int',
		'idtracking' => 'int',
		'idstorie' => 'int',
		'idtask' => 'int',
		'idteam' => 'int'
	];

	protected $fillable = [
		'idproject',
		'idspace',
		'idplanning',
		'idtracking',
		'idstorie',
		'idtask',
		'idteam',
		'namedocument',
		'pathdocument'
	];

	public function project()
	{
		return $this->belongsTo(Project::class, 'idproject');
	}

	public function space()
	{
		return $this->belongsTo(Space::class, 'idspace');
	}

	public function planning()
	{
		return $this->belongsTo(Planning::class, 'idplanning');
	}

	public function tracking()
	{
		return $this->belongsTo(Tracking::class, 'idtracking');
	}

	public function story()
	{
		return $this->belongsTo(Story::class, 'idstorie');
	}

	public function task()
	{
		return $this->belongsTo(Task::class, 'idtask');
	}

	public function team()
	{
		return $this->belongsTo(Team::class, 'idteam');
	}
}
