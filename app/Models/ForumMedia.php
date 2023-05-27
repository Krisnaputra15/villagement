<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

/**
 * Class ForumMedia
 * 
 * @property string $id
 * @property string $forum_id
 * @property string $nama_file
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Forum $forum
 *
 * @package App\Models
 */
class ForumMedia extends Model
{
	use HasUlids;
	protected $table = 'forum_media';
	public $incrementing = false;

	protected $fillable = [
		'forum_id',
		'nama_file'
	];

	public function forum()
	{
		return $this->belongsTo(Forum::class);
	}
}
