<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SprintTrackingSpreadsheet
 * 
 * @property int $idsts
 * @property int|null $idsprint
 * @property string|null $documentsts
 * @property Carbon|null $deliverysts
 * @property Carbon|null $returnsts
 * @property string|null $statussts
 * @property string|null $commetsts
 * 
 * @property Sprint|null $sprint
 *
 * @package App\Models
 */
class SprintTrackingSpreadsheet extends Model
{
	protected $table = 'sprint_tracking_spreadsheet';
	protected $primaryKey = 'idsts';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'idsts' => 'int',
		'idsprint' => 'int',
		'deliverysts' => 'datetime',
		'returnsts' => 'datetime'
	];

	protected $fillable = [
		'idsprint',
		'documentsts',
		'deliverysts',
		'returnsts',
		'statussts',
		'commetsts'
	];

	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'idsprint');
	}
}
