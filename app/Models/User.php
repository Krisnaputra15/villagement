<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property string $id
 * @property string|null $email
 * @property string|null $google_id
 * @property string|null $picture_url
 * @property string $nik
 * @property string|null $password
 * @property string|null $nama
 * @property string|null $dusun
 * @property int|null $rt
 * @property int|null $rw
 * @property string|null $level
 * @property int|null $is_active
 * 
 * @property Collection|Forum[] $forums
 * @property Collection|Permohonan[] $permohonans
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use HasUlids;
	protected $table = 'users';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rt' => 'int',
		'rw' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'google_id',
		'picture_url',
		'email',
		'nik',
		'password',
		'nama',
		'dusun',
		'rt',
		'rw',
		'pekerjaan',
		'level',
		'is_active'
	];

	public function forums()
	{
		return $this->hasMany(Forum::class, 'creator_id');
	}

	public function permohonans()
	{
		return $this->hasMany(Permohonan::class);
	}
}
