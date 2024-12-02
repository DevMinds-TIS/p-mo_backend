<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int $idstatus
 * @property string|null $namestatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Notification[] $notifications
 * @property Collection|Story[] $stories
 * @property Collection|Tracking[] $trackings
 * @property Collection|Weekly[] $weeklies
 * @property Collection|Announcement[] $announcements
 * @property Collection|Task[] $tasks
 *
 * @package App\Models
 */
class Status extends Model
{
	protected $table = 'status';
	protected $primaryKey = 'idstatus';

	protected $fillable = [
		'namestatus'
	];

	public function notifications()
	{
		return $this->hasMany(Notification::class, 'idstatus');
	}

	public function stories()
	{
		return $this->hasMany(Story::class, 'idstatus');
	}

	public function trackings()
	{
		return $this->hasMany(Tracking::class, 'idstatus');
	}

	public function weeklies()
	{
		return $this->hasMany(Weekly::class, 'idstatus');
	}

	public function announcements()
	{
		return $this->hasMany(Announcement::class, 'idstatus');
	}

	public function tasks()
	{
		return $this->hasMany(Task::class, 'idstatus');
	}
}
