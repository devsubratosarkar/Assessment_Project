<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\menu;
use App\Model\User\slider;
use App\Model\User\work;
use App\Model\User\service;
use App\Model\User\company;
use App\Model\User\testimonial;
use App\Model\User\feature;
use App\Model\User\partner;
use App\Model\User\blog;
use App\Model\User\category;
use App\Model\User\social;
use App\Model\User\counter;
use App\Model\User\general;
use App\Model\User\subscriber;
use App\Model\User\batch;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menus = menu::with('sub_menu')->get();
        $sliders = slider::all();
        $works = work::all();
        $services = service::all();
        $companies = company::take(4)->get();;
        $testimonials = testimonial::all();
        $features = feature::all()->take(4);
        $partners = partner::all();
        $blogs = blog::take(36)->get();
        $socials = social::all();
        $counters = counter::all();
        $subscribers = subscriber::all();
        $general = general::first();
        $categorys = category::all();
        $batchs = batch::all();


        return view('user.index', compact('menus','sliders','works','services','companies','testimonials','features','partners','blogs','socials','counters','general','subscribers', 'categorys', 'batchs'));
    }

}
