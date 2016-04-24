<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'photo',
		'phone',
		'job',
		'department_id'
	];

	public function department() {
		return $this->belongsTo( 'App\Department', 'department_id' );
	}

	public function managers() {
		return $this->hasMany( 'App\Department', 'manager_id' );
	}

	public function permalink() {
		return route( 'employee.show', $this->id );
	}

	public function edit_link() {
		return route( 'employee.edit', $this->id );
	}
}
