<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class project_file extends Model
{
	protected $fillable = [
        'file', 'blog_id',
    ];

    public function blog()
    {
    	return $this->belongs(blog::class, 'id');
    }
}
