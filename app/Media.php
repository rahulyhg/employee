<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {
	protected $table = 'media';

	protected $fillable = [
		'name',
		'url',
		'size',
		'type',
	];

	public function get_url() {
		return $this->url;
	}

	public function get_name() {
		return $this->name;
	}
}
