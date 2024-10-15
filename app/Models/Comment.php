<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * 
 * @property int $idcomment
 * @property int|null $idann
 * @property string|null $contentcomment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Announcement|null $announcement
 *
 * @package App\Models
 */
class Comment extends Model
{
	protected $table = 'comments';
	protected $primaryKey = 'idcomment';

	protected $casts = [
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
