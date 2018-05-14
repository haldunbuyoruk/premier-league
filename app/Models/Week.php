<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 May 2018 16:30:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Week
 * 
 * @property int $id
 * @property string $name
 * @property int $season_id
 *
 * @package App\Models
 */
class Week extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'season_id' => 'int'
	];

	protected $fillable = [
		'name',
		'season_id'
	];
}
