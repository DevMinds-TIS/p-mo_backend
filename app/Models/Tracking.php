<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tracking
 * 
 * @property int $idtracking
 * @property int|null $idsprint
 * @property int|null $iduser
 * @property string|null $nametracking
 * @property Carbon|null $deliverytracking
 * @property Carbon|null $returntracking
 * @property string|null $statustracking
 * @property string|null $commenttracking
 * 
 * @property Sprint|null $sprint
 * @property User|null $user
 * @property Collection|Document[] $documents
 *
 * @package App\Models
 */
class Tracking extends Model
{
	protected $table = 'tracking';
	protected $primaryKey = 'idtracking';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idtracking' => 'int',
		'idsprint' => 'int',
		'iduser' => 'int',
		'deliverytracking' => 'datetime',
		'returntracking' => 'datetime'
	];

	protected $fillable = [
		'idsprint',
		'iduser',
		'nametracking',
		'deliverytracking',
		'returntracking',
		'statustracking',
		'commenttracking'
	];

	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'idsprint');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function documents()
	{
		return $this->hasMany(Document::class, 'idtracking');
	}
}
