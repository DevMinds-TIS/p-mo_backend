<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * 
 * @property int $idcomment
 * @property int|null $idann
 * @property string|null $contentcomment
 * 
 * @property Announcement|null $announcement
 *
 * @package App\Models
 */
class Comment extends Model
{
	protected $table = 'comments';
	protected $primaryKey = 'idcomment';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idcomment' => 'int',
		'idann' => 'int'
	];

	protected $fillable = [
		'idann',
		'contentcomment'
	];

	public function announcement()
	{
		return $this->belongsTo(Announcement::class, 'idann');
	}
}
