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
 * Class Forum
 * 
 * @property string $id
 * @property string $creator_id
 * @property string|null $judul
 * @property string $content
 * @property string|null $replied_to
 * @property int $upvote_count
 * @property int $view_count
 * @property string $status
 * @property bool $is_ditutup
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|ForumMedia[] $forum_media
 * @property Collection|ForumView[] $forum_views
 * @property Collection|ForumVote[] $forum_votes
 *
 * @package App\Models
 */
class Forum extends Model
{
	use HasUlids;
	protected $table = 'forum';

	protected $primaryKey = 'id';
	public $incrementing = false;

	protected $casts = [
		'upvote_count' => 'int',
		'view_count' => 'int',
		'is_ditutup' => 'bool'
	];

	protected $fillable = [
		'creator_id',
		'judul',
		'content',
		'replied_to',
		'upvote_count',
		'view_count',
		'status',
		'is_ditutup'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'creator_id');
	}

	public function forum_media()
	{
		return $this->hasMany(ForumMedia::class);
	}

	public function forum_views()
	{
		return $this->hasMany(ForumView::class);
	}

	public function forum_votes()
	{
		return $this->hasMany(ForumVote::class);
	}
}
