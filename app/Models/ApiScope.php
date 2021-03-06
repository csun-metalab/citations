<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiScope extends Model
{
	protected $table = "scopes";
	protected $primaryKey = "system_name";
	public $incrementing = false;

	/**
	 * Returns a BelongsToMany instance representing the set of permissions
	 * associated with this scope.
	 *
	 * @return BelongsToMany
	 */
	public function permissions() {
		return $this->belongsToMany('App\ApiPermission', 'permission_scope', 'scope', 'permission');
	}

	/**
	 * Returns whether this scope has all possible permissions.
	 *
	 * @return bool
	 */
	public function hasAllPermissions() {
		return $this->system_name == 'all';
	}

	/**
	 * Returns whether this scope has a specific permission.
	 *
	 * @param string $permission The system name of the permission to check
	 * @return bool
	 */
	public function hasPermission($permission) {
		// if the scope is "all" then we can do anything
		if($this->hasAllPermissions()) {
			return true;
		}

		if(!isset($this->permissions)) {
			$this->load('permissions');
		}

		foreach($this->permissions as $permissionObj) {
			if($permissionObj->system_name == $permission) {
				return true;
			}
		}

		return false;
	}
}