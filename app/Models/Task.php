<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * 
 * @property int $idtask
 * @property int|null $idstorie
 * @property int|null $iduser
 * @property int|null $idstatus
 * @property string|null $nametask
 * @property Carbon|null $starttask
 * @property Carbon|null $endtask
 * @property int|null $scoretask
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Story|null $story
 * @property User|null $user
 * @property Status|null $status
 * @property Collection|Document[] $documents
 * @property Collection|Score[] $scores
 *
 * @package App\Models
 */
class Task extends Model
{
	protected $table = 'tasks';
	protected $primaryKey = 'idtask';

	protected $casts = [
		'idstorie' => 'int',
		'iduser' => 'int',
		'idstatus' => 'int',
		'starttask' => 'datetime',
		'endtask' => 'datetime',
		'scoretask' => 'int'
	];

	protected $fillable = [
		'idstorie',
		'iduser',
		'idstatus',
		'nametask',
		'starttask',
		'endtask',
		'scoretask'
	];

	public function story()
	{
		return $this->belongsTo(Story::class, 'idstorie');
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
		return $this->hasMany(Document::class, 'idtask');
	}

	public function scores()
	{
		return $this->hasMany(Score::class, 'idtask');
	}
}
