<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 May 2018 16:37:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Team
 * 
 * @property int $id
 * @property string $name
 * @property string $logo
 *
 * @package App\Models
 */
class Team extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'name',
        'logo'
	];
}
