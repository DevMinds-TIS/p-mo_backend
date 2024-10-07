<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WeeklyEvaSpreadsheet
 * 
 * @property int $idwes
 * @property int|null $idsprint
 * @property string|null $goalwes
 * @property Carbon|null $startwes
 * @property Carbon|null $endwes
 * @property string|null $statuswes
 * 
 * @property Sprint|null $sprint
 * @property Collection|Task[] $tasks
 *
 * @package App\Models
 */
class WeeklyEvaSpreadsheet extends Model
{
	protected $table = 'weekly_eva_spreadsheet';
	protected $primaryKey = 'idwes';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idwes' => 'int',
		'idsprint' => 'int',
		'startwes' => 'datetime',
		'endwes' => 'datetime'
	];

	protected $fillable = [
		'idsprint',
		'goalwes',
		'startwes',
		'endwes',
		'statuswes'
	];

	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'idsprint');
	}

	public function tasks()
	{
		return $this->hasMany(Task::class, 'idwes');
	}
}
