<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Weekly
 * 
 * @property int $idweeklie
 * @property int|null $idsprint
 * @property string|null $goalweeklie
 * @property Carbon|null $startweeklie
 * @property Carbon|null $endweeklie
 * @property string|null $statusweeklie
 * 
 * @property Sprint|null $sprint
 * @property Collection|Task[] $tasks
 *
 * @package App\Models
 */
class Weekly extends Model
{
	protected $table = 'weeklies';
	protected $primaryKey = 'idweeklie';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idweeklie' => 'int',
		'idsprint' => 'int',
		'startweeklie' => 'datetime',
		'endweeklie' => 'datetime'
	];

	protected $fillable = [
		'idsprint',
		'goalweeklie',
		'startweeklie',
		'endweeklie',
		'statusweeklie'
	];

	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'idsprint');
	}

	public function tasks()
	{
		return $this->hasMany(Task::class, 'idweeklie');
	}
}
