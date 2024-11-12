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
 * @property string|null $messagenotification
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Notification extends Model
{
	protected $table = 'notifications';
	protected $primaryKey = 'idnotification';

	protected $casts = [
		'iduser' => 'int'
	];

	protected $fillable = [
		'iduser',
		'messagenotification'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}
}
