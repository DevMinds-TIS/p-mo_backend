<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeerEvaluation
 * 
 * @property int $idpe
 * @property int|null $idcriteria
 * @property int|null $iduser
 * @property Carbon|null $datepe
 * 
 * @property Criterion|null $criterion
 * @property User|null $user
 *
 * @package App\Models
 */
class PeerEvaluation extends Model
{
	protected $table = 'peer_evaluations';
	protected $primaryKey = 'idpe';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idpe' => 'int',
		'idcriteria' => 'int',
		'iduser' => 'int',
		'datepe' => 'datetime'
	];

	protected $fillable = [
		'idcriteria',
		'iduser',
		'datepe'
	];

	public function criterion()
	{
		return $this->belongsTo(Criterion::class, 'idcriteria');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}
}
