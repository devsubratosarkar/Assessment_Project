<?php

namespace App\Http\Controllers;

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


class SearchController extends Controller
{
    public function search(Request $request)
	{
		
		
		$search = $request->input('title');
		$blogs = blog::where('title', 'LIKE', '%' . $search . '%')->paginate(36);
		
		$general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $services = service::all();
        $features = feature::all();
        

        return view('user.single_blog',compact('general','socials','menus','services','features','blogs','search'));

	}

	public function adSearch(Request $request)
	{
		

		$query = blog::query();

		if ($request->has('title') && $request->title != '') {
			$blogs = $query->where('title', 'LIKE', '%' . $request->title . '%');
		}


		if ($request->has('student') && $request->student != '') {

			$stu = student::where('name', 'LIKE', '%' . $request->student . '%')->pluck('id')->toArray();
			

			if(count($stu) > 0){

				$proStu = project_student::whereIn('student_id',$stu)->pluck('project_id')->toArray();

				if (count($proStu) > 0) {
					$blogs =  $query->whereIn('id', $proStu);
				}

			}

		}


		if ($request->has('roll') && $request->roll != '') {

			$stu = student::where('roll', 'LIKE', '%' . $request->roll . '%')->pluck('id')->toArray();
			

			if(count($stu) > 0){

				$proStu = project_student::whereIn('student_id',$stu)->pluck('project_id')->toArray();

				if (count($proStu) > 0) {
					$blogs =  $query->whereIn('id', $proStu);
				}

			}

		}


		if ($request->has('cat_id') && $request->cat_id != '') {
			$blogs =   $query->where('cat_id', $request->cat_id);
		}

		if ($request->has('batch_id') && $request->batch_id != '') {
			$blogs =   $query->where('batch_id', $request->batch_id);
		}


		$blogs = $blogs->paginate(36);



		$general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $services = service::all();
        $features = feature::all();

        return view('user.single_blog',compact('general','socials','menus','services','features','blogs'));

	}
}
