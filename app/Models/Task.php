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
 * @property int|null $idwes
 * @property int|null $idstudent
 * @property string|null $nametask
 * @property Carbon|null $starttask
 * @property Carbon|null $endtask
 * @property string|null $statustask
 * @property int|null $scoretask
 * 
 * @property WeeklyEvaSpreadsheet|null $weekly_eva_spreadsheet
 * @property Student|null $student
 *
 * @package App\Models
 */
class Task extends Model
{
	protected $table = 'task';
	protected $primaryKey = 'idtask';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idtask' => 'int',
		'idwes' => 'int',
		'idstudent' => 'int',
		'starttask' => 'datetime',
		'endtask' => 'datetime',
		'scoretask' => 'int'
	];

	protected $fillable = [
		'idwes',
		'idstudent',
		'nametask',
		'starttask',
		'endtask',
		'statustask',
		'scoretask'
	];

	public function weekly_eva_spreadsheet()
	{
		return $this->belongsTo(WeeklyEvaSpreadsheet::class, 'idwes');
	}

	public function student()
	{
		return $this->belongsTo(Student::class, 'idstudent');
	}
}
