<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $idcategory
 * @property string|null $namecategory
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Criterion[] $criteria
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'category';
	protected $primaryKey = 'idcategory';

	protected $fillable = [
		'namecategory'
	];

	public function criteria()
	{
		return $this->hasMany(Criterion::class, 'idcategory');
	}
}
