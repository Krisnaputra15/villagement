<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DataDesa
 * 
 * @property string $id
 * @property string $nama_desa
 * @property string $alamat_desa
 * @property string $nama_kepala_desa
 * @property string $nama_kecamatan
 * @property string $nama_kabupaten
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class DataDesa extends Model
{
	protected $table = 'data_desa';
	public $incrementing = false;

	protected $fillable = [
		'nama_desa',
		'alamat_desa',
		'nama_kepala_desa',
		'nama_kecamatan',
		'nama_kabupaten'
	];
}
