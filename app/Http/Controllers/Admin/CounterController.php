<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\counter;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = counter::all();
        return view('admin.counter.show',compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.counter.counter');
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
            'title' => 'required',
            'number' => 'required',

        ]);

        $counter = new counter;
            $counter->icon    = $request->icon;
            $counter->title    = $request->title;
            $counter->number = $request->number;
            $counter->save();
            
            return redirect(route('counter.index'))->with('messege', 'Counter Add Successfully');

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
        $counters = counter::find($id);

        return view('admin.counter.edit',compact('counters'));
        
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
            'title' => 'required',
            'number' => 'required',

        ]);

        $counter = counter::find($id);

            $counter->icon    = $request->icon;
            $counter->title    = $request->title;
            $counter->number = $request->number;
            $counter->update();

            return redirect(route('counter.index'))->with('messege', 'Counter Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $counters = counter::find($id);
    
        $counters->delete();

        return back()->with('messege', 'Counter Delete Successfully');
    }
}
