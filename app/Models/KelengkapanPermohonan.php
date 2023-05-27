<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

/**
 * Class KelengkapanPermohonan
 * 
 * @property string $id
 * @property string $permohonan_id
 * @property string $nama_file
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Permohonan $permohonan
 *
 * @package App\Models
 */
class KelengkapanPermohonan extends Model
{
	use HasUlids;
	protected $table = 'kelengkapan_permohonan';
	public $incrementing = false;

	protected $fillable = [
		'permohonan_id',
		'nama_file'
	];

	public function permohonan()
	{
		return $this->belongsTo(Permohonan::class);
	}
}
