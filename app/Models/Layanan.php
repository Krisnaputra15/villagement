<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Layanan
 * 
 * @property int $id
 * @property string $nama_layanan
 * @property string $deskripsi
 * @property string $syarat
 * 
 * @property Collection|Permohonan[] $permohonans
 *
 * @package App\Models
 */
class Layanan extends Model
{
	protected $table = 'layanan';
	public $timestamps = false;

	protected $fillable = [
		'nama_layanan',
		'deskripsi',
		'syarat',
	];

	public function permohonans()
	{
		return $this->hasMany(Permohonan::class);
	}
}
