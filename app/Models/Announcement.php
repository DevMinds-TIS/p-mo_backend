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
 * @property string|null $titleann
 * @property string|null $contentann
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Project|null $project
 * @property Space|null $space
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
		'idspace' => 'int'
	];

	protected $fillable = [
		'idproject',
		'idspace',
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

	public function comments()
	{
		return $this->hasMany(Comment::class, 'idann');
	}
}
