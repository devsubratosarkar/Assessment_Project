<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\blog;
use App\Model\User\batch;
use App\Model\User\general;
use App\Model\User\category;
use App\Model\User\project_file;
use App\Model\User\project_student;
use App\Model\User\student;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $blogs = blog::paginate(10);
        $generals = general::first();
        
        return view('admin.blog.show',compact('blogs','generals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = category::all();
        $batchs = batch::all();

        return view('admin.blog.blog', compact('categorys','batchs'));
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

            'cat_id' => 'required',
            'batch_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'sometimes|required|image',

        ]);

        if (count($request->student_id) == 0) {
            return back()->withErros(['Student field is required']);
        }

        

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/blog/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $blog->image;
        }

        $blog = new blog;
            $blog->cat_id  = $request->cat_id;
            $blog->batch_id  = $request->batch_id;
            $blog->image    = $fileName;
            $blog->title    = $request->title;
            $blog->description = $request->description;
            $blog->save();


            foreach ($request->student_id as $key => $student) {
               $ps = new project_student();
               $ps->project_id = $blog->id;
               $ps->student_id = $student;
               $ps->save();
            }


          if ($request->hasfile('file')) {
           
            foreach ($request->file('file') as $key => $file) {
                $fileNm = urlencode( $request->file_name[$key]).'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path() . '/user/file/', $fileNm);

                $project_file = new project_file();
                $project_file->blog_id = $blog->id;
                $project_file->file = $fileNm;
                $project_file->file_name = $request->file_name[$key];
                $project_file->save();

            }
        }
            
            return redirect(route('blog.index'))->with('messege', 'Blog Successfully');
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
        $blogs = blog::find($id);
        $categorys =category::all();
        $batchs =batch::all();
        $project_student = student::where('batch_id',$blogs->batch_id)->get();
        $selectedBlogAtudentId = $blogs->project_student->pluck('student_id')->toArray();
       
        // return  $project_student;
        // return  $selectedBlogAtudentId;


        // return $blogs->project_file;
        return view('admin.blog.edit',compact('blogs', 'categorys', 'batchs','project_student','selectedBlogAtudentId'));
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
            
            'cat_id' => 'required',
            'batch_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'student_id' => 'required',
            'image' => 'sometimes|required|image',

        ]);

        

        if (count($request->student_id) == 0) {
            return back()->withErros(['Student field is required']);
        }
        $blog = blog::find($id);


        if ($request->hasFile('image')) {
            @unlink('public/user/img/blog/'.$blog->image);
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/user/img/blog/'.$fileName;
            Image::make($image)->save($location);
        }else{
           $fileName = $blog->image;
        }

            $blog->cat_id  = $request->cat_id;
            $blog->batch_id  = $request->batch_id;
            $blog->image       = $fileName;
            $blog->title       = $request->title;
            $blog->description = $request->description;
            $blog->update();


            $blog->project_student()->delete();


            foreach ($request->student_id as $key => $student) {
               $ps = new project_student();
               $ps->project_id = $blog->id;
               $ps->student_id = $student;
               $ps->save();
            }

            

            if ($request->hasfile('file')) {
           
            foreach ($request->file('file') as $file) {
                $fileNm = urlencode( $request->file_name[$key]).'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path() . '/user/file/', $fileNm);

                $project_file = new project_file();
                $project_file->blog_id = $blog->id;
                $project_file->file = $fileNm;
                $project_file->file_name = $request->file_name[$key];
                $project_file->save();

            }
        }

        

            return redirect(route('blog.index'))->with('messege', 'Blog Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = blog::find($id);
        unlink(public_path().'/user/img/blog/'.$blogs->image);
        unlink(public_path().'/user/file/'.$project_file->file);
    
        $blogs->delete();

        return back()->with('messege', 'Blog Delete Successfully');
    }

   

    public function ajaxGetstudent(Request $request)
    {
        
         $batchId = $request->batch_id;
         $batch = batch::find($batchId);

         $html = '';
         if (count($batch->student) > 0) {
            foreach ($batch->student as $key => $student) {
                $html .=  "<option value=".$student->id.">".$student->name."</option>";
            }
         }else{
            $html .= "<option value=''>No Student Found</option>";
         }

        return  $html;
    }

    public function fileDel($file)
    {
        $project_files = project_file::find($file);

        @unlink(public_path().'/user/file/'.$project_files->file);

        $project_files->delete();

        return back()->with('messege', 'File Delete Successfully');

    }
}
