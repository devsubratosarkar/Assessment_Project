<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class batch extends Model
{
    protected $fillable = [
        'batch_id',
    ];

    public function student()
    {
    	return $this->hasMany(student::class, 'batch_id');
    }

    public function blog()
    {
    	return $this->hasMany(blog::class, 'batch_id');
    }
}
