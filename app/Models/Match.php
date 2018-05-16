<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 May 2018 16:37:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Match
 * 
 * @property int $id
 * @property int $week_id
 * @property int $home
 * @property int $away
 *
 * @package App\Models
 */
class Match extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'week_id' => 'int',
		'home' => 'int',
		'away' => 'int'
	];

	protected $fillable = [
		'week_id',
		'home',
		'away'
	];
}
