<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\category;
use App\Model\User\blog;
use App\Model\User\general;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = category::all();
        
        return view('admin.category.show',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.category');
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
            // 'description' => 'required',
            // 'image' => 'required|image',
            // 'file' => 'required|mimes:pdf,xlx,csv|max:2048',

        ]);

        // $fileNm = time().'.'.$request->file->extension();  
        // $request->file->move(public_path('/user/file/'), $fileNm);

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $fileName = time().'.'.$image->getClientOriginalExtension();
        //     $location = public_path().'/user/img/category/'.$fileName;
        //     Image::make($image)->save($location);
        // }else{
        //    $fileName = $category->image;
        // }

        $category = new category;
            // $category->image    = $fileName;
            $category->name    = $request->name;
            // $category->description = $request->description;
            // $category->file = $fileNm;
            $category->save();
            
            return redirect(route('category.index'))->with('messege', 'Category Successfully');
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
        $categorys = category::find($id);

        return view('admin.category.edit',compact('categorys'));
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
            // 'description' => 'required',
            // 'image' => 'sometimes|required|image',
            // 'file' => 'required|mimes:pdf,xlx,csv|max:2048',

        ]);

        $category = category::find($id);

        //  $fileNm = time().'.'.$request->file->extension();  
        // $request->file->move(public_path('/user/file/'), $fileNm);

        // if ($request->hasFile('image')) {
        //     @unlink('public/user/img/category/'.$category->image);
        //     $image = $request->file('image');
        //     $fileName = time().'.'.$image->getClientOriginalExtension();
        //     $location = public_path().'/user/img/category/'.$fileName;
        //     Image::make($image)->save($location);
        // }else{
        //    $fileName = $category->image;
        // }


            //$category->image       = $fileName;
            $category->name       = $request->name;
            //$category->description = $request->description;
            //$category->file = $fileNm;
            $category->update();

            return redirect(route('category.index'))->with('messege', 'Category Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorys = category::find($id);
        // unlink(public_path().'/user/img/category/'.$categorys->image);
        // unlink(public_path().'/user/file/'.$categorys->file);
    
        $categorys->delete();

        return back()->with('messege', 'Category Delete Successfully');
    }

    public function getCat($id)
     {
        $generals = general::first();
        $categorys = category::all();
        $blogs = blog::where('cat_id', $id)->paginate(36);


        return view('admin.blog.show', compact('blogs', 'categorys', 'generals'));

     }
}
