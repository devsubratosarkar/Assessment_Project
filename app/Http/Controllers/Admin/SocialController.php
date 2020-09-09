<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\social;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = social::all();
        return view('admin.social.show',compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social.social');
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

            'icon' => 'required',
            'url' => 'required',

        ]);

        $social = new social;
            $social->icon = $request->icon;
            $social->url    = $request->url;
            $social->save();
            
            return redirect(route('social.index'))->with('messege', 'Social Add Successfully');

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
        $socials = social::find($id);

        return view('admin.social.edit',compact('socials'));
        
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

            'icon' => 'required',
            'url' => 'required',

        ]);

        $social = social::find($id);

            $social->icon        = $request->icon;
            $social->url       = $request->url;
            $social->update();

            return redirect(route('social.index'))->with('messege', 'Social Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socials = social::find($id);
    
        $socials->delete();

        return back()->with('messege', 'Social Delete Successfully');
    }
}
