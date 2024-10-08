<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * 
 * @property int $idnotification
 * @property int|null $iduser
 * @property string|null $messagenotification
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Notification extends Model
{
	protected $table = 'notifications';
	protected $primaryKey = 'idnotification';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idnotification' => 'int',
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
