<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Announcement
 * 
 * @property int $idann
 * @property int|null $idproject
 * @property int|null $idspace
 * @property int|null $idstatus
 * @property string|null $titleann
 * @property string|null $contentann
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Project|null $project
 * @property Space|null $space
 * @property Status|null $status
 * @property Collection|Comment[] $comments
 *
 * @package App\Models
 */
class Announcement extends Model
{
	protected $table = 'announcements';
	protected $primaryKey = 'idann';

	protected $casts = [
		'idproject' => 'int',
		'idspace' => 'int',
		'idstatus' => 'int'
	];

	protected $fillable = [
		'idproject',
		'idspace',
		'idstatus',
		'titleann',
		'contentann'
	];

	public function project()
	{
		return $this->belongsTo(Project::class, 'idproject');
	}

	public function space()
	{
		return $this->belongsTo(Space::class, 'idspace');
	}

	public function status()
	{
		return $this->belongsTo(Status::class, 'idstatus');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class, 'idann');
	}
}
