<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\general;
use App\Model\User\menu;
use App\Model\User\sub_menu;
use App\Model\User\blog;
use App\Model\User\subscriber;
use App\Model\User\service;
use App\Model\User\feature;
use App\Model\User\company;
use App\Model\User\testimonial;
use Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general = general::first();
        $menus = menu::all();
        $sub_menus = sub_menu::all();
        $blogs = blog::all();
        $subscribers = subscriber::all();
        $services = service::all();
        $features = feature::all();
        $companys = company::all();
        $testimonials = testimonial::all();


        return view('admin.home',compact('general','menus','sub_menus','blogs','subscribers','services','features','companys','testimonials'));
    }

    public function adminLogout()
    {
       
        Auth::guard('admin')->logout();
    
        return redirect()->route('admin.login');
    }
}
