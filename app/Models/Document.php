<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Document
 * 
 * @property int $iddocument
 * @property int|null $idproject
 * @property int|null $idspace
 * @property int|null $idplanning
 * @property int|null $idtracking
 * @property string|null $pathdocument
 * 
 * @property Project|null $project
 * @property Space|null $space
 * @property Planning|null $planning
 * @property Tracking|null $tracking
 *
 * @package App\Models
 */
class Document extends Model
{
	protected $table = 'documents';
	protected $primaryKey = 'iddocument';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'iddocument' => 'int',
		'idproject' => 'int',
		'idspace' => 'int',
		'idplanning' => 'int',
		'idtracking' => 'int'
	];

	protected $fillable = [
		'idproject',
		'idspace',
		'idplanning',
		'idtracking',
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
}
