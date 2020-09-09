<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\service;
use App\Model\User\general;
use Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = service::all();
        $generals = general::first();
        return view('admin.service.show',compact('services','generals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.service');
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
            'image' => 'sometimes|required|image',

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/services/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $service->image;
        }

        $service = new service;
            $service->image    = $fileName;
            $service->title    = $request->title;
            $service->description = $request->description;
            $service->save();
            
            return redirect(route('service.index'))->with('messege', 'Service Successfully');
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
        $services = service::find($id);

        return view('admin.service.edit',compact('services'));
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
            'image' => 'sometimes|required|image',

        ]);

        $service = service::find($id);

        if ($request->hasFile('image')) {
            @unlink('public/user/img/services/'.$service->image);
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/services/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $service->image;
        }


            $service->image       = $fileName;
            $service->title       = $request->title;
            $service->description = $request->description;
            $service->update();

            return redirect(route('service.index'))->with('messege', 'Service Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = service::find($id);
        unlink(public_path().'/user/img/services/'.$services->image);
    
        $services->delete();

        return back()->with('messege', 'Service Delete Successfully');
    }
}
