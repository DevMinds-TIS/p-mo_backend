<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * 
 * @property int $iduser
 * @property int|null $idsiscode
 * @property int|null $idpermission
 * @property int|null $use_iduser
 * @property string|null $nameuser
 * @property string|null $lastnameuser
 * @property string|null $emailuser
 * @property string|null $passworduser
 * @property string|null $profileuser
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Siscode|null $siscode
 * @property Permission|null $permission
 * @property User|null $user
 * @property Collection|FinalEvaluation[] $final_evaluations
 * @property Collection|Notification[] $notifications
 * @property Collection|PeerEvaluation[] $peer_evaluations
 * @property Collection|Permission[] $permissions
 * @property Collection|Role[] $roles
 * @property Collection|Story[] $stories
 * @property Collection|Score[] $scores
 * @property Collection|SelfAssessment[] $self_assessments
 * @property Collection|Siscode[] $siscodes
 * @property Collection|Tracking[] $trackings
 * @property Collection|TeamMember[] $team_members
 * @property Collection|User[] $users
 * @property Collection|Project[] $projects
 * @property Collection|Space[] $spaces
 * @property Collection|Team[] $teams
 * @property Collection|Task[] $tasks
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'users';
	protected $primaryKey = 'iduser';

	protected $casts = [
		'idsiscode' => 'int',
		'idpermission' => 'int',
		'use_iduser' => 'int'
	];

	protected $fillable = [
		'idsiscode',
		'idpermission',
		'use_iduser',
		'nameuser',
		'lastnameuser',
		'emailuser',
		'passworduser',
		'profileuser'
	];

	public function siscode()
	{
		return $this->belongsTo(Siscode::class, 'idsiscode');
	}

	public function permission()
	{
		return $this->belongsTo(Permission::class, 'idpermission');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'use_iduser');
	}

	public function final_evaluations()
	{
		return $this->hasMany(FinalEvaluation::class, 'iduser');
	}

	public function notifications()
	{
		return $this->hasMany(Notification::class, 'iduser');
	}

	public function peer_evaluations()
	{
		return $this->hasMany(PeerEvaluation::class, 'iduser');
	}

	public function permissions()
	{
		return $this->hasMany(Permission::class, 'iduser');
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'role_user', 'iduser', 'idrol')
					->withPivot('idroleuser', 'idteammember')
					->withTimestamps();
	}

	public function stories()
	{
		return $this->hasMany(Story::class, 'iduser');
	}

	public function scores()
	{
		return $this->hasMany(Score::class, 'iduser');
	}

	public function self_assessments()
	{
		return $this->hasMany(SelfAssessment::class, 'iduser');
	}

	public function siscodes()
	{
		return $this->hasMany(Siscode::class, 'iduser');
	}

	public function trackings()
	{
		return $this->hasMany(Tracking::class, 'iduser');
	}

	public function team_members()
	{
		return $this->hasMany(TeamMember::class, 'iduser');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'use_iduser');
	}

	public function projects()
	{
		return $this->hasMany(Project::class, 'iduser');
	}

	public function spaces()
	{
		return $this->hasMany(Space::class, 'iduser');
	}

	public function teams()
	{
		return $this->hasMany(Team::class, 'iduser');
	}

	public function tasks()
	{
		return $this->hasMany(Task::class, 'iduser');
	}
}
