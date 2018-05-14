<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 May 2018 16:30:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TeamStrength
 * 
 * @property int $id
 * @property int $team_id
 * @property bool $is_home
 * @property string $strength
 *
 * @package App\Models
 */
class TeamStrength extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'team_id' => 'int',
		'is_home' => 'bool'
	];

	protected $fillable = [
		'team_id',
		'is_home',
		'strength'
	];
}
