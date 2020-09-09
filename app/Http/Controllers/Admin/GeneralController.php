<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\general;
use Image;

class GeneralController extends Controller
{
    
    public function index()
    {
        $generals = general::first();

        return view('admin.general.create',compact('generals'));
    }

   
    public function update(Request $request, $id)
    {
        $general = general::find($id);

        if ($request->has('blog_header')) {
            $bh = $request->blog_header;
        }else{
            $bh = $general->blog_header;
        }

         if ($request->has('blog_title')) {
            $bt = $request->blog_title;
        }else{
            $bt = $general->blog_title;
        }

         if ($request->has('blog_description')) {
            $bd = $request->blog_description;
        }else{
            $bd = $general->blog_description;
        }

        if ($request->has('service_header')) {
            $sh = $request->service_header;
        }else{
            $sh = $general->service_header;
        }

         if ($request->has('service_title')) {
            $st = $request->service_title;
        }else{
            $st = $general->service_title;
        }

         if ($request->has('service_description')) {
            $sd = $request->service_description;
        }else{
            $sd = $general->service_description;
        }

        if ($request->has('company_header')) {
            $cmh = $request->company_header;
        }else{
            $cmh = $general->company_header;
        }

         if ($request->has('company_title')) {
            $cmt = $request->company_title;
        }else{
            $cmt = $general->company_title;
        }

        if ($request->has('about_video')) {
            $av = $request->about_video;
        }else{
            $av = $general->about_video;
        }

        if ($request->has('web_title')) {
            $wt = $request->web_title;
        }else{
            $wt = $general->web_title;
        }

        if ($request->has('features_header')) {
            $fh = $request->features_header;
        }else{
            $fh = $general->features_header;
        }

         if ($request->has('features_title')) {
            $ft = $request->features_title;
        }else{
            $ft = $general->features_title;
        }

         if ($request->has('features_description')) {
            $fd = $request->features_description;
        }else{
            $fd = $general->features_description;
        }

        if ($request->has('contact_header')) {
            $ch = $request->contact_header;
        }else{
            $ch = $general->contact_header;
        }

         if ($request->has('contact_title')) {
            $ct = $request->contact_title;
        }else{
            $ct = $general->contact_title;
        }

         if ($request->has('contact_number')) {
            $cn = $request->contact_number;
        }else{
            $cn = $general->contact_number;
        }

        if ($request->has('contact_email')) {
            $ce = $request->contact_email;
        }else{
            $ce = $general->contact_email;
        }

         if ($request->has('contact_address')) {
            $ca = $request->contact_address;
        }else{
            $ca = $general->contact_address;
        }

         if ($request->has('privacy_policy_title')) {
            $ppt = $request->privacy_policy_title;
        }else{
            $ppt = $general->privacy_policy_title;
        }

        if ($request->has('privacy_policy_description')) {
            $ppd = $request->privacy_policy_description;
        }else{
            $ppd = $general->privacy_policy_description;
        }

        if ($request->has('footer_description')) {
            $footerd = $request->footer_description;
        }else{
            $footerd = $general->footer_description;
        }

        if ($request->has('footer')) {
            $footer = $request->footer;
        }else{
            $footer = $general->footer;
        }

        if ($request->has('map_url')) {
            $map = $request->map_url;
        }else{
            $map = $general->map_url;
        }

        if ($request->has('admin_footer')) {
            $admin_foot = $request->admin_footer;
        }else{
            $admin_foot = $general->admin_footer;
        }

        if ($request->has('color')) {
            $color = substr($request->color,1);
        }else{
            $color = $general->color;
        }

            $general->web_title            = $wt;
            $general->service_header       = $sh;
            $general->service_title        = $st;
            $general->service_description  = $sd;
            $general->company_header       = $cmh;
            $general->company_title        = $cmt;
            $general->about_video          = $av;
            $general->features_header      = $fh;
            $general->features_title       = $ft;
            $general->features_description = $fd;
            $general->contact_header       = $ch;
            $general->contact_title        = $ct;
            $general->contact_number       = $cn;
            $general->contact_email        = $ce;
            $general->contact_address      = $ca;
            $general->blog_header          = $bh;
            $general->blog_title           = $bt;
            $general->blog_description     = $bd;
            $general->privacy_policy_title = $ppt;
            $general->privacy_policy_description = $ppd;
            $general->footer_description   = $footerd;
            $general->footer               = $footer;
            $general->admin_footer         = $admin_foot;
            $general->map_url              = $map;
            $general->color                = $color;
            $general->update();

            return back()->with('messege', 'Update Successfully');
    }

    public function indexLogo()
    {
        return view('admin.logo.create');
    }

    public function updateLogo(Request $request)
    {
        $this->validate($request,array(
            'logo' => 'sometimes|required|mimes:png,jpg,jpeg' ,
        ));

        if ($request->hasFile('logo')) {
            @unlink('public/user/img/logo.png');
            $image = $request->file('logo');
            $filename = 'logo' . '.' . 'png';
            $location = 'public/user/img/'. $filename;
            Image::make($image)->save($location);
        };

        return redirect()->back()->with('messege', 'Successfully Logo Updated');
    }

    public function updateIcon(Request $request)
    {
        $this->validate($request,array(
            'icon' => 'sometimes|required|mimes:png,jpg,jpeg' ,
        ));

        if ($request->hasFile('icon')) {
            @unlink('public/user/img/icon.png');
            $image = $request->file('icon');
            $filename = 'icon' . '.' . 'png';
            $location = 'public/user/img/'. $filename;
            Image::make($image)->save($location);
        };

        return redirect()->back()->with('messege', 'Successfully Icon Updated');
    }

    public function indexBreadcrumbs()
    {
        return view('admin.breadcrumbs.create');
    }

    public function updateMenuimage(Request $request)
    {
        $this->validate($request,array(
            'menu_bg_img' => 'sometimes|required|mimes:png,jpg,jpeg' ,
        ));

        if ($request->hasFile('menu_bg_img')) {
            @unlink('public/user/img/menu_bg_img.png');
            $image = $request->file('menu_bg_img');
            $filename = 'menu_bg_img' . '.' . 'png';
            $location = 'public/user/img/'. $filename;
            Image::make($image)->save($location);
        };

        return redirect()->back()->with('messege', 'Successfully Menu Background Image Updated');
    }

    public function updateAboutimage(Request $request)
    {
        $this->validate($request,array(
            'about_img' => 'sometimes|required|mimes:png,jpg,jpeg' ,
        ));

        if ($request->hasFile('about_img')) {
            @unlink('public/user/img/about_image.png');
            $image = $request->file('about_img');
            $filename = 'about_image' . '.' . 'png';
            $location = 'public/user/img/'. $filename;
            Image::make($image)->save($location);
        };

        return redirect()->back()->with('messege', 'Successfully Company Video Image Updated');
    }

    public function updateContactimage(Request $request)
    {
        $this->validate($request,array(
            'contact_bg_img' => 'sometimes|required|mimes:png,jpg,jpeg' ,
        ));

        if ($request->hasFile('contact_bg_img')) {
            @unlink('public/user/img/contact_bg_img.png');
            $image = $request->file('contact_bg_img');
            $filename = 'contact_bg_img' . '.' . 'png';
            $location = 'public/user/img/'. $filename;
            Image::make($image)->save($location);
        };

        return redirect()->back()->with('messege', 'Successfully Contact Background Image Updated');
    }

    public function indexAbout()
    {
        $generals = general::first();

        return view('admin.about.create',compact('generals'));
    }

    public function updateAbout(Request $request)
    {
        $this->validate($request,array(
            'about_image' => 'sometimes|required|mimes:png,jpg,jpeg' ,
            'about_title' => 'required' ,
            'about_description' => 'required' ,
        ));

        if ($request->hasFile('about_image')) {
            @unlink('public/user/img/about_image/about_us.png');
            $image = $request->file('about_image');
            $filename = 'about_us' . '.' . 'png';
            $location = 'public/user/img/about_image/'. $filename;
            Image::make($image)->save($location);
        };
        $general = general::first();
         $general->about_title        = $request->about_title;
            $general->about_description       = $request->about_description;
            $general->update();

        return redirect()->back()->with('messege', 'Successfully About Us Image Updated');
    }

     public function indexPrivacypolicy()
    {
        $generals = general::first();

        return view('admin.privacy_policy.create',compact('generals'));
    }

    public function indexContact()
    {
        $generals = general::first();
        
        return view('admin.contact.create',compact('generals'));
    }
    
}
