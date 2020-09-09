<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\testimonial;
use Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = testimonial::all();
        return view('admin.testimonial.show',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.testimonial');
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
            'designation' => 'required',
            'description' => 'required',
            'image' => 'required|image',

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/testimonials/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $testimonial->image;
        }

        $testimonial = new testimonial;
            $testimonial->image    = $fileName;
            $testimonial->name = $request->name;
            $testimonial->designation    = $request->designation;
            $testimonial->description     = $request->description;
            $testimonial->save();
            
            return redirect(route('testimonial.index'))->with('messege', 'Testimonial Successfully');
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
        $testimonials = testimonial::find($id);

        return view('admin.testimonial.edit',compact('testimonials'));
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
            'designation' => 'required',
            'description' => 'required',
            'image' => 'sometimes|required|image',

        ]);

        $testimonial = testimonial::find($id);

        if ($request->hasFile('image')) {
            @unlink('public/user/img/testimonials/'.$testimonial->image);
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/testimonials/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $testimonial->image;
        }


            $testimonial->image       = $fileName;
            $testimonial->name        = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->description = $request->description;
            $testimonial->update();

            return redirect(route('testimonial.index'))->with('messege', 'Testimonial Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonials = testimonial::find($id);
        unlink(public_path().'/user/img/testimonials/'.$testimonials->image);
    
        $testimonials->delete();

        return back()->with('messege', 'Testimonial Delete Successfully');
    }
}
