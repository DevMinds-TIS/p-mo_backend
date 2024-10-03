<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property int $idstudent
 * @property int|null $idteacher
 * @property int|null $idteam
 * @property string|null $codesisstudent
 * @property string|null $namestudent
 * @property string|null $lastnamestudent
 * @property string|null $emailstudent
 * @property string|null $passwdstudent
 * @property string|null $profilestudent
 * 
 * @property Teacher|null $teacher
 * @property Team|null $team
 * @property Collection|Notification[] $notifications
 * @property Collection|PeerToPeerEvaluation[] $peer_to_peer_evaluations
 * @property Collection|SelfAssessment[] $self_assessments
 * @property Collection|Task[] $tasks
 * @property Collection|UserStoriesSpreadsheet[] $user_stories_spreadsheets
 *
 * @package App\Models
 */
class Student extends Model
{
	protected $table = 'student';
	protected $primaryKey = 'idstudent';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idstudent' => 'int',
		'idteacher' => 'int',
		'idteam' => 'int'
	];

	protected $fillable = [
		'idteacher',
		'idteam',
		'codesisstudent',
		'namestudent',
		'lastnamestudent',
		'emailstudent',
		'passwdstudent',
		'profilestudent'
	];

	public function teacher()
	{
		return $this->belongsTo(Teacher::class, 'idteacher');
	}

	public function team()
	{
		return $this->belongsTo(Team::class, 'idteam');
	}

	public function notifications()
	{
		return $this->hasMany(Notification::class, 'idstudent');
	}

	public function peer_to_peer_evaluations()
	{
		return $this->hasMany(PeerToPeerEvaluation::class, 'idstudent_evaluated');
	}

	public function self_assessments()
	{
		return $this->hasMany(SelfAssessment::class, 'idstudent');
	}

	public function tasks()
	{
		return $this->hasMany(Task::class, 'idstudent');
	}

	public function user_stories_spreadsheets()
	{
		return $this->hasMany(UserStoriesSpreadsheet::class, 'idstudent');
	}
}
