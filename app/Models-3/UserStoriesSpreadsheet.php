<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserStoriesSpreadsheet
 * 
 * @property int $iduss
 * @property int|null $idsprint
 * @property int|null $idstudent
 * @property string|null $codeuss
 * @property string|null $nameuss
 * @property string|null $statususs
 * @property int|null $pointstuss
 * 
 * @property Sprint|null $sprint
 * @property Student|null $student
 *
 * @package App\Models
 */
class UserStoriesSpreadsheet extends Model
{
	protected $table = 'user_stories_spreadsheet';
	protected $primaryKey = 'iduss';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'iduss' => 'int',
		'idsprint' => 'int',
		'idstudent' => 'int',
		'pointstuss' => 'int'
	];

	protected $fillable = [
		'idsprint',
		'idstudent',
		'codeuss',
		'nameuss',
		'statususs',
		'pointstuss'
	];

	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'idsprint');
	}

	public function student()
	{
		return $this->belongsTo(Student::class, 'idstudent');
	}
}
