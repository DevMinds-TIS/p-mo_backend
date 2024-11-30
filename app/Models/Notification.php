<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * 
 * @property int $idnotification
 * @property int|null $iduser
 * @property int|null $idstatus
 * @property string|null $messagenotification
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property Status|null $status
 *
 * @package App\Models
 */
class Notification extends Model
{
	protected $table = 'notifications';
	protected $primaryKey = 'idnotification';

	protected $casts = [
		'iduser' => 'int',
		'idstatus' => 'int'
	];

	protected $fillable = [
		'iduser',
		'idstatus',
		'messagenotification'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function status()
	{
		return $this->belongsTo(Status::class, 'idstatus');
	}
}
