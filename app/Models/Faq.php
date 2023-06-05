<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
/**
 * Class Faq
 * 
 * @property string $id
 * @property string $pertanyaan
 * @property string $jawaban
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Faq extends Model
{
	use HasUlids;
	protected $table = 'faqs';
	public $incrementing = false;

	protected $fillable = [
		'pertanyaan',
		'jawaban'
	];
}
