<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class project_student extends Model
{
    protected $fillable = [
        'project_id','student_id',
    ];

    public function blog()
    {
    	return $this->belongs(blog::class, 'id');
    }

    public function student()
    {
    	return $this->belongs(student::class, 'id');
    }
}
