<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Criterion
 * 
 * @property int $idcriteria
 * @property int|null $idcategory
 * @property string|null $namecriteria
 * @property int|null $scorecriteria
 * @property string|null $commentcriteria
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Category|null $category
 * @property Collection|CrossEvaluation[] $cross_evaluations
 * @property Collection|FinalEvaluation[] $final_evaluations
 * @property Collection|PeerEvaluation[] $peer_evaluations
 * @property Collection|SelfAssessment[] $self_assessments
 *
 * @package App\Models
 */
class Criterion extends Model
{
	protected $table = 'criteria';
	protected $primaryKey = 'idcriteria';

	protected $casts = [
		'idcategory' => 'int',
		'scorecriteria' => 'int'
	];

	protected $fillable = [
		'idcategory',
		'namecriteria',
		'scorecriteria',
		'commentcriteria'
	];

	public function category()
	{
		return $this->belongsTo(Category::class, 'idcategory');
	}

	public function cross_evaluations()
	{
		return $this->hasMany(CrossEvaluation::class, 'idcriteria');
	}

	public function final_evaluations()
	{
		return $this->hasMany(FinalEvaluation::class, 'idcriteria');
	}

	public function peer_evaluations()
	{
		return $this->hasMany(PeerEvaluation::class, 'idcriteria');
	}

	public function self_assessments()
	{
		return $this->hasMany(SelfAssessment::class, 'idcriteria');
	}
}
