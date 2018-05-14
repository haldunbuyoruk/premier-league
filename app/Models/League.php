<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 May 2018 17:41:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class League
 * 
 * @property int $id
 * @property int $team_id
 * @property int $points
 * @property int $played
 * @property int $won
 * @property int $lose
 * @property int $draw
 * @property int $goal_drawn
 *
 * @package App\Models
 */
class League extends Eloquent
{
	protected $table = 'league';
	public $timestamps = false;

	protected $casts = [
		'team_id' => 'int',
		'points' => 'int',
		'played' => 'int',
		'won' => 'int',
		'lose' => 'int',
		'draw' => 'int',
		'goal_drawn' => 'int'
	];

	protected $fillable = [
		'team_id',
		'points',
		'played',
		'won',
		'lose',
		'draw',
		'goal_drawn'
	];
}
