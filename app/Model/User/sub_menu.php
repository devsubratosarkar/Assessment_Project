<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class sub_menu extends Model
{

    protected $fillable = [
        'menu_id',
    ];

    public function menu()
    {
    	return $this->belongs(menu::class, 'id');
    }
}
