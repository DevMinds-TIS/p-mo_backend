<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Story
 * 
 * @property int $idstorie
 * @property int|null $idsprint
 * @property int|null $iduser
 * @property string|null $codestorie
 * @property string|null $namestorie
 * @property string|null $statusstorie
 * @property int|null $pointstorie
 * 
 * @property Sprint|null $sprint
 * @property User|null $user
 *
 * @package App\Models
 */
class Story extends Model
{
	protected $table = 'stories';
	protected $primaryKey = 'idstorie';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idstorie' => 'int',
		'idsprint' => 'int',
		'iduser' => 'int',
		'pointstorie' => 'int'
	];

	protected $fillable = [
		'idsprint',
		'iduser',
		'codestorie',
		'namestorie',
		'statusstorie',
		'pointstorie'
	];

	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'idsprint');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}
}
