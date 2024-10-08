<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

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
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idann' => 'int',
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
