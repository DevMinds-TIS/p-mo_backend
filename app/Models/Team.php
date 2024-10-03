<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 * 
 * @property int $idteam
 * @property int|null $idspace
 * @property int|null $idplanning
 * @property string|null $nameteam
 * @property string|null $companyteam
 * @property string|null $emailteam
 * @property string|null $profileteam
 * 
 * @property Space|null $space
 * @property Planning|null $planning
 * @property Collection|CrossAssessment[] $cross_assessments
 * @property Collection|Student[] $students
 * @property Collection|Planning[] $plannings
 *
 * @package App\Models
 */
class Team extends Model
{
	protected $table = 'team';
	protected $primaryKey = 'idteam';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idteam' => 'int',
		'idspace' => 'int',
		'idplanning' => 'int'
	];

	protected $fillable = [
		'idspace',
		'idplanning',
		'nameteam',
		'companyteam',
		'emailteam',
		'profileteam'
	];

	public function space()
	{
		return $this->belongsTo(Space::class, 'idspace');
	}

	public function planning()
	{
		return $this->belongsTo(Planning::class, 'idplanning');
	}

	public function cross_assessments()
	{
		return $this->hasMany(CrossAssessment::class, 'idevaluated_team');
	}

	public function students()
	{
		return $this->hasMany(Student::class, 'idteam');
	}

	public function plannings()
	{
		return $this->hasMany(Planning::class, 'idteam');
	}
}
