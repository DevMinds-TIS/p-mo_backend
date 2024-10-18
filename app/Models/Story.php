<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Story
 * 
 * @property int $idstorie
 * @property int|null $idweeklie
 * @property int|null $iduser
 * @property string|null $codestorie
 * @property string|null $namestorie
 * @property string|null $statusstorie
 * @property int|null $pointstorie
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Weekly|null $weekly
 * @property User|null $user
 * @property Collection|Document[] $documents
 * @property Collection|Task[] $tasks
 *
 * @package App\Models
 */
class Story extends Model
{
	protected $table = 'stories';
	protected $primaryKey = 'idstorie';

	protected $casts = [
		'idweeklie' => 'int',
		'iduser' => 'int',
		'pointstorie' => 'int'
	];

	protected $fillable = [
		'idweeklie',
		'iduser',
		'codestorie',
		'namestorie',
		'statusstorie',
		'pointstorie'
	];

	public function weekly()
	{
		return $this->belongsTo(Weekly::class, 'idweeklie');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function documents()
	{
		return $this->hasMany(Document::class, 'idstorie');
	}

	public function tasks()
	{
		return $this->hasMany(Task::class, 'idstorie');
	}
}
