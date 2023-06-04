<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
/**
 * Class ForumView
 * 
 * @property string $id
 * @property string $user_id
 * @property string $forum_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Forum $forum
 * @property User $user
 *
 * @package App\Models
 */
class ForumView extends Model
{
	use HasUlids;
	protected $table = 'forum_views';
	public $incrementing = false;

	protected $fillable = [
		'user_id',
		'forum_id'
	];

	public function forum()
	{
		return $this->belongsTo(Forum::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
