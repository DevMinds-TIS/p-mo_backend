<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sprint
 * 
 * @property int $idsprint
 * @property int|null $idplanning
 * @property Carbon|null $startsprint
 * @property Carbon|null $endsprint
 * @property string|null $goalsprint
 * 
 * @property Planning|null $planning
 * @property Collection|Tracking[] $trackings
 * @property Collection|Story[] $stories
 * @property Collection|Weekly[] $weeklies
 *
 * @package App\Models
 */
class Sprint extends Model
{
	protected $table = 'sprints';
	protected $primaryKey = 'idsprint';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idsprint' => 'int',
		'idplanning' => 'int',
		'startsprint' => 'datetime',
		'endsprint' => 'datetime'
	];

	protected $fillable = [
		'idplanning',
		'startsprint',
		'endsprint',
		'goalsprint'
	];

	public function planning()
	{
		return $this->belongsTo(Planning::class, 'idplanning');
	}

	public function trackings()
	{
		return $this->hasMany(Tracking::class, 'idsprint');
	}

	public function stories()
	{
		return $this->hasMany(Story::class, 'idsprint');
	}

	public function weeklies()
	{
		return $this->hasMany(Weekly::class, 'idsprint');
	}
}
