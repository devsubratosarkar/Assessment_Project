<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\sub_menu;
use App\Model\User\menu;
use Image;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_menus = sub_menu::all();
        return view('admin.sub_menu.show',compact('sub_menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = menu::all();
        return view('admin.sub_menu.sub_menu',compact('menus'));
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

            'menu_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'sometimes|required|image',

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/sub_menu/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $sub_menu->image;
        }

        $sub_menu = new sub_menu;
            $sub_menu->menu_id  = $request->menu_id;
            $sub_menu->image    = $fileName;
            $sub_menu->name     = $request->name;
            $sub_menu->title    = $request->title;
            $sub_menu->description = $request->description;
            $sub_menu->save();
            
            return redirect(route('sub_menu.index'))->with('messege', 'Sub Menu Successfully');
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
        $sub_menus = sub_menu::find($id);
        $menus =menu::all();

        return view('admin.sub_menu.edit',compact('sub_menus','menus'));
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

            'menu_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'sometimes|required|image',

        ]);

        $sub_menu = sub_menu::find($id);

        if ($request->hasFile('image')) {
            @unlink('public/user/img/sub_menu/'.$sub_menu->image);
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/sub_menu/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $sub_menu->image;
        }
            $sub_menu->menu_id  = $request->menu_id;
            $sub_menu->image       = $fileName;
            $sub_menu->name        = $request->name;
            $sub_menu->title       = $request->title;
            $sub_menu->description = $request->description;
            $sub_menu->update();

            return redirect(route('sub_menu.index'))->with('messege', 'Sub Menu Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_menus = sub_menu::find($id);
        unlink(public_path().'/user/img/sub_menu/'.$sub_menus->image);
    
        $sub_menus->delete();

        return back()->with('messege', 'Sub Menu Delete Successfully');
    }
}
