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
 * @property int|null $idstatus
 * @property string|null $goalweeklie
 * @property Carbon|null $startweeklie
 * @property Carbon|null $endweeklie
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Sprint|null $sprint
 * @property Status|null $status
 * @property Collection|Score[] $scores
 * @property Collection|Story[] $stories
 *
 * @package App\Models
 */
class Weekly extends Model
{
	protected $table = 'weeklies';
	protected $primaryKey = 'idweeklie';

	protected $casts = [
		'idsprint' => 'int',
		'idstatus' => 'int',
		'startweeklie' => 'datetime',
		'endweeklie' => 'datetime'
	];

	protected $fillable = [
		'idsprint',
		'idstatus',
		'goalweeklie',
		'startweeklie',
		'endweeklie'
	];

	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'idsprint');
	}

	public function status()
	{
		return $this->belongsTo(Status::class, 'idstatus');
	}

	public function scores()
	{
		return $this->hasMany(Score::class, 'idweeklie');
	}

	public function stories()
	{
		return $this->hasMany(Story::class, 'idweeklie');
	}
}
