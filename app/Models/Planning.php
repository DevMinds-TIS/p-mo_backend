<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Planning
 * 
 * @property int $idplanning
 * @property int|null $idteam
 * @property string|null $partaplanning
 * @property string|null $partbplanning
 * @property string|null $contractplanning
 * @property string|null $paymentplanning
 * 
 * @property Team|null $team
 * @property Collection|Sprint[] $sprints
 * @property Collection|Team[] $teams
 *
 * @package App\Models
 */
class Planning extends Model
{
	protected $table = 'planning';
	protected $primaryKey = 'idplanning';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idplanning' => 'int',
		'idteam' => 'int'
	];

	protected $fillable = [
		'idteam',
		'partaplanning',
		'partbplanning',
		'contractplanning',
		'paymentplanning'
	];

	public function team()
	{
		return $this->belongsTo(Team::class, 'idteam');
	}

	public function sprints()
	{
		return $this->hasMany(Sprint::class, 'idplanning');
	}

	public function teams()
	{
		return $this->hasMany(Team::class, 'idplanning');
	}
}
