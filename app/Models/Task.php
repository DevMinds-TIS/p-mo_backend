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
 * @property string|null $nametask
 * @property Carbon|null $starttask
 * @property Carbon|null $endtask
 * @property string|null $statustask
 * @property int|null $scoretask
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Story|null $story
 * @property User|null $user
 * @property Collection|Document[] $documents
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
		'starttask' => 'datetime',
		'endtask' => 'datetime',
		'scoretask' => 'int'
	];

	protected $fillable = [
		'idstorie',
		'iduser',
		'nametask',
		'starttask',
		'endtask',
		'statustask',
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

	public function documents()
	{
		return $this->hasMany(Document::class, 'idtask');
	}
}
