<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\feature;
use App\Model\User\general;
use Image;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = feature::all();
        $generals = general::first();
        return view('admin.feature.show',compact('features','generals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feature.feature');
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

            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/projects/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = null;
        }

        $feature = new feature;
            $feature->image    = $fileName;
            $feature->title    = $request->title;
            $feature->description = $request->description;
            $feature->save();
            
            return redirect(route('feature.index'))->with('messege', 'Feature Successfully');
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
        $features = feature::find($id);

        return view('admin.feature.edit',compact('features'));
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

            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',

        ]);

        $feature = feature::find($id);

        if ($request->hasFile('image')) {
            @unlink('public/user/img/projects/'.$feature->image);
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/projects/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = null;
        }


            $feature->image       = $fileName;
            $feature->title       = $request->title;
            $feature->description = $request->description;
            $feature->update();

            return redirect(route('feature.index'))->with('messege', 'Feature Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $features = feature::find($id);
        unlink(public_path().'/user/img/projects/'.$features->image);
    
        $features->delete();

        return back()->with('messege', 'Feature Delete Successfully');
    }
}
