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
		if ( $this->manager ) {
			return $this->hasMany( 'App\Employee', 'department_id' )->where( 'id', '!=', $this->manager->id );
		}

		return $this->hasMany( 'App\Employee', 'department_id' );
	}

	public function manager() {
		return $this->belongsTo( 'App\Employee', 'manager_id' );
	}

	public function permalink() {
		return route( 'department.show', $this->id );
	}

	public function edit_link() {
		return route( 'department.edit', $this->id );
	}

	public function totalEmployees() {
		if ( ! $this->manager ) {
			return $this->employees->count();
		}

		return $this->employees->count() + 1;
	}

	public function delete_link() {
		return route( 'department.delete', $this->id );
	}

	public function cover() {
		return $this->belongsTo( 'App\Media', 'cover_id' );
	}
}
