<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\blog;
use App\Model\User\general;
use App\Model\User\social;
use App\Model\User\menu;
use App\Model\User\category;
use App\Model\User\project_student;
use App\Model\User\student;
use App\Model\User\sub_menu;
use App\Model\User\service;
use App\Model\User\feature;
use Carbon\Carbon;

class SearchProjectController extends Controller
{
    public function searchPro(Request $request)
	{
		
		
		$query = blog::query();

		$start = Carbon::parse($request->start_date)->format('Y-m-d');
		$end = Carbon::parse($request->end_date)->format('Y-m-d');


		

		



		if ($request->title != '') {
			$blogs = $query->where('title', 'LIKE', '%' . $request->title . '%');
		}

		if (($request->start_date != '')) {
			
			$blogs = $query->whereDate('updated_at', '>=',$start);
			


		}

		if (( $request->end_date != '')) {
			$blogs = $query->whereDate('updated_at', '<=',$end);
		}


		
		$blogs = $query->paginate(36);



		$generals = general::first();
        $socials = social::all();
        $menus = menu::all();
        $services = service::all();
        $features = feature::all();
        

        return view('admin.blog.show',compact('generals','socials','menus','services','features','blogs','request'));

	}
}
