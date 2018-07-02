<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'role_permissions';

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
	protected $fillable = ['rol_id', 'module','uri', 'method', 'allow'];

}
