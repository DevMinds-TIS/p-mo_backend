<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * 
 * @property int $idtask
 * @property int|null $idweeklie
 * @property int|null $iduser
 * @property string|null $nametask
 * @property Carbon|null $starttask
 * @property Carbon|null $endtask
 * @property string|null $statustask
 * @property int|null $scoretask
 * 
 * @property Weekly|null $weekly
 * @property User|null $user
 *
 * @package App\Models
 */
class Task extends Model
{
	protected $table = 'tasks';
	protected $primaryKey = 'idtask';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idtask' => 'int',
		'idweeklie' => 'int',
		'iduser' => 'int',
		'starttask' => 'datetime',
		'endtask' => 'datetime',
		'scoretask' => 'int'
	];

	protected $fillable = [
		'idweeklie',
		'iduser',
		'nametask',
		'starttask',
		'endtask',
		'statustask',
		'scoretask'
	];

	public function weekly()
	{
		return $this->belongsTo(Weekly::class, 'idweeklie');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}
}
