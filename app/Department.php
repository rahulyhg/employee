<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'manager_id',
		'phone'
	];

	public function employees() {
		return $this->hasMany( 'App\Employee', 'department_id' );
	}

	public function manager() {
		return $this->belongsTo( 'App\Employee', 'manager_id' );
	}

	public function permalink() {
		return route( 'department.show', $this->id );
	}
}
