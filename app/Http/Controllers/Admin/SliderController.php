<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\slider;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = slider::all();
        return view('admin.slider.show',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.slider');
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

            'header' => 'required',
            'title' => 'required',
            'image' => 'required|image',

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/slider/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $slider->image;
        }

        $slider = new slider;
            $slider->image    = $fileName;
            $slider->header = $request->header;
            $slider->title    = $request->title;
            $slider->save();
            
            return redirect(route('slider.index'))->with('messege', 'Slider Successfully');
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
        $sliders = slider::find($id);

        return view('admin.slider.edit',compact('sliders'));
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

            'header' => 'required',
            'title' => 'required',
            'image' => 'sometimes|required|image',

        ]);

        $slider = slider::find($id);

        if ($request->hasFile('image')) {
            @unlink('public/user/img/slider/'.$slider->image);
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/slider/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $slider->image;
        }


            $slider->image       = $fileName;
            $slider->header        = $request->header;
            $slider->title       = $request->title;
            $slider->update();

            return redirect(route('slider.index'))->with('messege', 'Slider Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders = slider::find($id);
        unlink(public_path().'/user/img/slider/'.$sliders->image);
    
        $sliders->delete();

        return back()->with('messege', 'Slider Delete Successfully');
    }
}
