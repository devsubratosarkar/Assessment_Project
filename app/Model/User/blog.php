<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
	
    protected $fillable = [
        'title', 'description', 'image', 'cat_id', 'blog_id','project_id','batch_id',
    ];


    public function category()
    {
    	return $this->belongs(category::class, 'id');
    }


    public function project_file()
    {
    	return $this->hasMany(project_file::class, 'blog_id');
    }

    public function project_student()
    {
        return $this->hasMany(project_student::class, 'project_id');
    }

    public function batch()
    {
        return $this->belongsTo(batch::class, 'id');
    }


}
