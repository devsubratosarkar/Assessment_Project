<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    public function sub_menu()
    {
    	return $this->hasMany(sub_menu::class, 'menu_id');
    }
}
