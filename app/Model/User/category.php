<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function blog()
    {
    	return $this->hasMany(blog::class, 'cat_id');
    }
}
