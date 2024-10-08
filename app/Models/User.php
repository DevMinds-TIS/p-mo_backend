<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $iduser
 * @property int|null $idrol
 * @property int|null $idsiscode
 * @property int|null $idtoken
 * @property int|null $use_iduser
 * @property string|null $nameuser
 * @property string|null $lastnameuser
 * @property string|null $emailuser
 * @property string|null $passworduser
 * @property string|null $profileuser
 * 
 * @property Role|null $role
 * @property Siscode|null $siscode
 * @property Token|null $token
 * @property User|null $user
 * @property Collection|Project[] $projects
 * @property Collection|Tracking[] $trackings
 * @property Collection|User[] $users
 * @property Collection|Notification[] $notifications
 * @property Collection|PeerEvaluation[] $peer_evaluations
 * @property Collection|SelfAssessment[] $self_assessments
 * @property Collection|Siscode[] $siscodes
 * @property Collection|Story[] $stories
 * @property Collection|Task[] $tasks
 * @property Collection|TeamMember[] $team_members
 * @property Collection|Token[] $tokens
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'iduser';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'iduser' => 'int',
		'idrol' => 'int',
		'idsiscode' => 'int',
		'idtoken' => 'int',
		'use_iduser' => 'int'
	];

	protected $hidden = [
		'idtoken'
	];

	protected $fillable = [
		'idrol',
		'idsiscode',
		'idtoken',
		'use_iduser',
		'nameuser',
		'lastnameuser',
		'emailuser',
		'passworduser',
		'profileuser'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'idrol');
	}

	public function siscode()
	{
		return $this->belongsTo(Siscode::class, 'idsiscode');
	}

	public function token()
	{
		return $this->belongsTo(Token::class, 'idtoken');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'use_iduser');
	}

	public function projects()
	{
		return $this->hasMany(Project::class, 'iduser');
	}

	public function trackings()
	{
		return $this->hasMany(Tracking::class, 'iduser');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'use_iduser');
	}

	public function notifications()
	{
		return $this->hasMany(Notification::class, 'iduser');
	}

	public function peer_evaluations()
	{
		return $this->hasMany(PeerEvaluation::class, 'iduser');
	}

	public function self_assessments()
	{
		return $this->hasMany(SelfAssessment::class, 'iduser');
	}

	public function siscodes()
	{
		return $this->hasMany(Siscode::class, 'iduser');
	}

	public function stories()
	{
		return $this->hasMany(Story::class, 'iduser');
	}

	public function tasks()
	{
		return $this->hasMany(Task::class, 'iduser');
	}

	public function team_members()
	{
		return $this->hasMany(TeamMember::class, 'iduser');
	}

	public function tokens()
	{
		return $this->hasMany(Token::class, 'iduser');
	}
}
