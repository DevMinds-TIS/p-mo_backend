<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Announcement
 * 
 * @property int $ida
 * @property int|null $idspace
 * @property int|null $idproject
 * @property string|null $heada
 * @property string|null $bodya
 * @property string|null $scopea
 * 
 * @property Space|null $space
 * @property Project|null $project
 *
 * @package App\Models
 */
class Announcement extends Model
{
	protected $table = 'announcements';
	protected $primaryKey = 'ida';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'ida' => 'int',
		'idspace' => 'int',
		'idproject' => 'int'
	];

	protected $fillable = [
		'idspace',
		'idproject',
		'heada',
		'bodya',
		'scopea'
	];

	public function space()
	{
		return $this->belongsTo(Space::class, 'idspace');
	}

	public function project()
	{
		return $this->belongsTo(Project::class, 'idproject');
	}
}
