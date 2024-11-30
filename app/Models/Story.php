<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Story
 * 
 * @property int $idstorie
 * @property int|null $idweeklie
 * @property int|null $iduser
 * @property int|null $idstatus
 * @property string|null $codestorie
 * @property string|null $namestorie
 * @property int|null $pointstorie
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Weekly|null $weekly
 * @property User|null $user
 * @property Status|null $status
 * @property Collection|Document[] $documents
 * @property Collection|Task[] $tasks
 *
 * @package App\Models
 */
class Story extends Model
{
	protected $table = 'stories';
	protected $primaryKey = 'idstorie';

	protected $casts = [
		'idweeklie' => 'int',
		'iduser' => 'int',
		'idstatus' => 'int',
		'pointstorie' => 'int'
	];

	protected $fillable = [
		'idweeklie',
		'iduser',
		'idstatus',
		'codestorie',
		'namestorie',
		'pointstorie'
	];

	public function weekly()
	{
		return $this->belongsTo(Weekly::class, 'idweeklie');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function status()
	{
		return $this->belongsTo(Status::class, 'idstatus');
	}

	public function documents()
	{
		return $this->hasMany(Document::class, 'idstorie');
	}

	public function tasks()
	{
		return $this->hasMany(Task::class, 'idstorie');
	}
}
