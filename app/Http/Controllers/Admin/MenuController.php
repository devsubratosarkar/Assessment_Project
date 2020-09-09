<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\menu;
use Image;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = menu::all();
        
        return view('admin.menu.show',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.menu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'sometimes|required|image',

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/menu_singel/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $menu->image;
        }

        $menu = new menu;
            $menu->image    = $fileName;
            $menu->name = $request->name;
            $menu->title    = $request->title;
            $menu->description     = $request->description;
            $menu->save();
            
            return redirect(route('menu.index'))->with('messege', 'Menu Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = menu::find($id);

        return view('admin.menu.edit',compact('menus'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'sometimes|sometimes|required|image',

        ]);

        $menu = menu::find($id);

        if ($request->hasFile('image')) {
            @unlink('public/user/img/menu_singel/'.$menu->image);
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/menu_singel/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $menu->image;
        }


            $menu->image       = $fileName;
            $menu->name        = $request->name;
            $menu->title       = $request->title;
            $menu->description = $request->description;
            $menu->update();

            return redirect(route('menu.index'))->with('messege', 'Menu Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menus = menu::find($id);
        unlink(public_path().'/user/img/menu_singel/'.$menus->image);
    
        $menus->delete();

        return back()->with('messege', 'Menu Delete Successfully');
    }
}
