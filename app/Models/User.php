<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class User
 * 
 * @property string $id
 * @property string|null $email
 * @property string|null $google_id
 * @property string|null $picture_url
 * @property string|null $nik
 * @property string|null $password
 * @property string|null $nama
 * @property string|null $dusun
 * @property int|null $rt
 * @property int|null $rw
 * @property string|null $tempat_lahir
 * @property Carbon|null $tanggal_lahir
 * @property string|null $jenis_kelamin
 * @property string|null $desa
 * @property string|null $kecamatan
 * @property string|null $agama
 * @property string|null $status_kawin
 * @property string|null $kewarganegaraan
 * @property string|null $pekerjaan
 * @property string|null $level
 * @property bool $is_active
 * 
 * @property Collection|Forum[] $forums
 * @property Collection|ForumView[] $forum_views
 * @property Collection|Permohonan[] $permohonans
 *
 * @package App\Models
 */
class User extends Model implements Authenticatable
{
	use HasUlids;
	protected $table = 'users';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rt' => 'int',
		'rw' => 'int',
		'tanggal_lahir' => 'datetime',
		'is_active' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'email',
		'google_id',
		'picture_url',
		'nik',
		'password',
		'nama',
		'dusun',
		'rt',
		'rw',
		'tempat_lahir',
		'tanggal_lahir',
		'jenis_kelamin',
		'desa',
		'kecamatan',
		'agama',
		'status_kawin',
		'kewarganegaraan',
		'pekerjaan',
		'level',
		'is_active'
	];

	public function forums()
	{
		return $this->hasMany(Forum::class, 'creator_id');
	}

	public function forum_views()
	{
		return $this->hasMany(ForumView::class);
	}

	public function permohonans()
	{
		return $this->hasMany(Permohonan::class);
	}

	public function getAuthIdentifierName()
	{
		return 'id';
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the remember token for the user.
	 *
	 * @return string|null
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the remember token for the user.
	 *
	 * @param  string|null  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}
}
