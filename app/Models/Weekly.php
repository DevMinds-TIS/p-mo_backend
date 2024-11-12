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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Sprint|null $sprint
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

	public function stories()
	{
		return $this->hasMany(Story::class, 'idweeklie');
	}
}
