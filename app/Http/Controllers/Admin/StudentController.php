<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\student;
use App\Model\User\batch;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::all();

        return view('admin.student.create', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batchs = batch::all();
        
        return view('admin.student.add', compact('batchs'));
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

            'batch_id' => 'required',
            'name' => 'required',
            'roll' => 'required',

        ]);

        $student = new student;
            $student->batch_id  = $request->batch_id;
            $student->name  = $request->name;
            $student->roll  = $request->roll;
            $student->save();
            
            return redirect(route('student.index'))->with('messege', 'Student Successfully');
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
        $students = student::find($id);
        $batchs = batch::all();

        return view('admin.student.edit',compact('students', 'batchs'));
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
            
            'batch_id' => 'required',
            'name' => 'required',
            'roll' => 'required',

        ]);

        $student = student::find($id);

            $student->batch_id  = $request->batch_id;
            $student->name  = $request->name;
            $student->roll  = $request->roll;
            $student->update();

            return redirect(route('student.index'))->with('messege', 'Student Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = student::find($id);
    
        $students->delete();

        return back()->with('messege', 'Student Delete Successfully');
    }
}
