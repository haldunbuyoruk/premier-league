<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 May 2018 16:30:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Season
 * 
 * @property int $id
 * @property string $name
 * @property bool $finished
 *
 * @package App\Models
 */
class Season extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'finished' => 'bool'
	];

	protected $fillable = [
		'name',
		'finished'
	];
}
