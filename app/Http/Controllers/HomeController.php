<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User\general;
use App\Model\User\social;
use App\Model\User\menu;
use App\Model\User\sub_menu;
use App\Model\User\service;
use App\Model\User\feature;
use App\Model\User\blog;
use App\Model\User\category;
use App\Model\User\project_file;


class HomeController extends Controller
{
   public function serviceDetails($id)
    {   
        $general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $services = service::all();

        $seviceSingle = service::find($id);

        

        return view('user.service_details',compact('general','socials','menus','services','seviceSingle'));
    }

    public function featureDetails($id)
    {   
        $general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $services = service::all();
        $features = feature::all();


        $featureSingle = feature::find($id);

        

        return view('user.project_details',compact('general','socials','menus','services','features','featureSingle'));
    }

    public function blogDetails($id)
    {   
        $blogSingle = blog::find($id);
        $general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $services = service::all();
        $features = feature::all();
        $blogs = blog::all();
        $project_files = project_file::all();

        

        return view('user.blog_details',compact('general','socials','menus','services','features','blogs','blogSingle','project_files'));
    }

    public function recentPr()
    {
        $laatstepost = blog::latest()->first();

         return view('user.recent')->with('laatstepost', $laatstepost);
    }

    public function menuDetails($id)
    {   
        $general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $services = service::all();
        $features = feature::all();

        $menuSingle = menu::find($id);

        return view('user.single_menu',compact('general','socials','menus','services','features','menuSingle'));
    }

    public function blogSingle()
    {
        $general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $categorys = category::all();
        $services = service::all();
        $features = feature::all();
        $blogs = blog::paginate(12);
		
		

        return view('user.single_blog',compact('general','socials','menus','services','features','blogs', 'categorys'));
    }

     public function featureSingle()
    {
        $general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $services = service::all();
        $features = feature::paginate(12);


        return view('user.single_feature',compact('general','socials','menus','services','features'));
    }

    public function contactsDetails()
    {
        $general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $services = service::all();
        $features = feature::all();

        return view('user.contact',compact('general','socials','menus','services','features'));
    }
    public function submenuDetails($id)
    {
        $general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $submenus = sub_menu::all();
        $services = service::all();
        $features = feature::all();

        $submenuSingle = sub_menu::find($id);

        return view('user.single_submenu',compact('general','socials','menus','services','features','submenus','submenuSingle'));
    }

    public function aboutDetails()
    {
        $general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $submenus = sub_menu::all();
        $services = service::all();
        $features = feature::all();

        return view('user.about',compact('general','socials','menus','services','features','submenus'));
    }

    public function privacypolicyDetails()
    {
        $general = general::first();
        $socials = social::all();
        $menus = menu::all();
        $submenus = sub_menu::all();
        $services = service::all();
        $features = feature::all();

        return view('user.privacy_policy',compact('general','socials','menus','services','features','submenus'));
    }

     public function getCategory($id)
     {
        $general = general::first();
        $services = service::all();
        $categorys = category::all();
        $socials = social::all();
        $menus = menu::all();
        $blogs = blog::where('cat_id', $id)->paginate(36);


        return view('user.single_blog', compact('general', 'socials', 'menus', 'blogs', 'categorys', 'services'));

     }

}
