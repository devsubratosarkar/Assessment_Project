<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'name','roll','batch_id','student_id',
    ];

    public function batch()
    {
    	return $this->belongs(batch::class, 'id');
    }

    public function project_student()
    {
    	return $this->hasOne(project_student::class, 'student_id');
    }
}
