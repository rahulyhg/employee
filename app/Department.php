<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'manager_id', 'phone'
    ];

    public function employees()
    {
        return $this->hasMany('App\Employee', 'department_id');
    }
}
