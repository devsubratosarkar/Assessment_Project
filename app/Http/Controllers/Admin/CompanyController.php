<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\company;
use App\Model\User\general;
use Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = company::all();
        $generals = general::first();
        return view('admin.company.show',compact('companys','generals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.company');
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
            $location = public_path().'/user/img/company/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $company->image;
        }

        $company = new company;
            $company->image    = $fileName;
            $company->title    = $request->title;
            $company->description = $request->description;
            $company->save();
            
            return redirect(route('company.index'))->with('messege', 'Company Successfully');
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
        $companys = company::find($id);

        return view('admin.company.edit',compact('companys'));
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

        $company = company::find($id);

        if ($request->hasFile('image')) {
            @unlink('public/user/img/company/'.$company->image);
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/company/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $company->image;
        }


            $company->image       = $fileName;
            $company->title       = $request->title;
            $company->description = $request->description;
            $company->update();

            return redirect(route('company.index'))->with('messege', 'Company Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companys = company::find($id);
        unlink(public_path().'/user/img/company/'.$companys->image);
    
        $companys->delete();

        return back()->with('messege', 'Company Delete Successfully');
    }
}
