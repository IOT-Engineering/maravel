<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
	protected $table = 'dashboard';

	/**
	 * The database primary key value.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';

	/**
	 * Attributes that should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'vendor', 'module', 'controller','function','col','row'];

}
