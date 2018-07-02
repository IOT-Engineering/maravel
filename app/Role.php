<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

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
	protected $fillable = ['name', 'user_id'];


	public function scopeAdmin($query)
	{
		return $query->where('name', 'admin');
	}
	
	public function permissions()
	{
		return $this->hasMany('App\RolePermission')->orderBy('id');
	}

}
