<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\partner;
use Image;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = partner::all();
        return view('admin.partner.show',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.partner');
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

            'image' => 'required|image',

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/partners/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $partner->image;
        }

        $partner = new partner;
            $partner->image    = $fileName;
            $partner->save();
            
            return redirect(route('partner.index'))->with('messege', 'Partner Add Successfully');
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
        $partners = partner::find($id);

        return view('admin.partner.edit',compact('partners'));
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

            'image' => 'sometimes|required|image',

        ]);

        $partner = partner::find($id);

        if ($request->hasFile('image')) {
            @unlink('public/user/img/partners/'.$partner->image);
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/partners/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $partner->image;
        }


            $partner->image       = $fileName;
            $partner->update();

            return redirect(route('partner.index'))->with('messege', 'Partner Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partners = partner::find($id);
        unlink(public_path().'/user/img/partners/'.$partners->image);
    
        $partners->delete();

        return back()->with('messege', 'Partner Delete Successfully');
    }
}
