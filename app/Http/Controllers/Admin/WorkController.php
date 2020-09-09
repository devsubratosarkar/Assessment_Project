<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\work;
use Image;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = work::all();
        return view('admin.work.show',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.work.work');
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
            $location = public_path().'/user/img/works/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $work->image;
        }

        $work = new work;
            $work->image    = $fileName;
            $work->title    = $request->title;
            $work->description = $request->description;
            $work->save();
            
            return redirect(route('work.index'))->with('messege', 'Work Successfully');
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
        $works = work::find($id);

        return view('admin.work.edit',compact('works'));
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

        $work = work::find($id);

        if ($request->hasFile('image')) {
            @unlink('public/user/img/works/'.$work->image);
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/works/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $work->image;
        }


            $work->image       = $fileName;
            $work->title       = $request->title;
            $work->description = $request->description;
            $work->update();

            return redirect(route('work.index'))->with('messege', 'Work Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $works = work::find($id);
        unlink(public_path().'/user/img/works/'.$works->image);
    
        $works->delete();

        return back()->with('messege', 'Work Delete Successfully');
    }
}
