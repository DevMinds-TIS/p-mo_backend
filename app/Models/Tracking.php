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
 * @property int|null $idstatus
 * @property string|null $nametracking
 * @property Carbon|null $deliverytracking
 * @property Carbon|null $returntracking
 * @property string|null $commenttracking
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Sprint|null $sprint
 * @property User|null $user
 * @property Status|null $status
 * @property Collection|Document[] $documents
 * @property Collection|Score[] $scores
 *
 * @package App\Models
 */
class Tracking extends Model
{
	protected $table = 'tracking';
	protected $primaryKey = 'idtracking';

	protected $casts = [
		'idsprint' => 'int',
		'iduser' => 'int',
		'idstatus' => 'int',
		'deliverytracking' => 'datetime',
		'returntracking' => 'datetime'
	];

	protected $fillable = [
		'idsprint',
		'iduser',
		'idstatus',
		'nametracking',
		'deliverytracking',
		'returntracking',
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

	public function status()
	{
		return $this->belongsTo(Status::class, 'idstatus');
	}

	public function documents()
	{
		return $this->hasMany(Document::class, 'idtracking');
	}

	public function scores()
	{
		return $this->hasMany(Score::class, 'idtracking');
	}
}
