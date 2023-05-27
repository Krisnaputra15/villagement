<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

/**
 * Class Permohonan
 * 
 * @property string $id
 * @property int $layanan_id
 * @property string $user_id
 * @property bool $is_accepted
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Layanan $layanan
 * @property User $user
 * @property Collection|KelengkapanPermohonan[] $kelengkapan_permohonans
 *
 * @package App\Models
 */
class Permohonan extends Model
{
	use HasUlids;
	protected $table = 'permohonan';
	public $incrementing = false;

	protected $casts = [
		'layanan_id' => 'int',
		'is_accepted' => 'bool'
	];

	protected $fillable = [
		'layanan_id',
		'user_id',
		'is_accepted'
	];

	public function layanan()
	{
		return $this->belongsTo(Layanan::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function kelengkapan_permohonans()
	{
		return $this->hasMany(KelengkapanPermohonan::class);
	}
}
