<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * 
 * @property int $idn
 * @property int|null $idstudent
 * @property int|null $idteacher
 * @property string|null $headn
 * @property string|null $bodyn
 * 
 * @property Student|null $student
 * @property Teacher|null $teacher
 *
 * @package App\Models
 */
class Notification extends Model
{
	protected $table = 'notifications';
	protected $primaryKey = 'idn';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idn' => 'int',
		'idstudent' => 'int',
		'idteacher' => 'int'
	];

	protected $fillable = [
		'idstudent',
		'idteacher',
		'headn',
		'bodyn'
	];

	public function student()
	{
		return $this->belongsTo(Student::class, 'idstudent');
	}

	public function teacher()
	{
		return $this->belongsTo(Teacher::class, 'idteacher');
	}
}
