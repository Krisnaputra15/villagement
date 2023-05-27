<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

/**
 * Class ForumVote
 * 
 * @property string $id
 * @property string $user_id
 * @property string $forum_id
 * @property string $vote_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Forum $forum
 *
 * @package App\Models
 */
class ForumVote extends Model
{
	use HasUlids;
	protected $table = 'forum_vote';
	public $incrementing = false;

	protected $fillable = [
		'user_id',
		'forum_id',
		'vote_type'
	];

	public function forum()
	{
		return $this->belongsTo(Forum::class);
	}
}
