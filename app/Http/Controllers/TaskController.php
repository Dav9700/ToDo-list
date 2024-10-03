<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tasks;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$tasks=Tasks::get();//Auth::user()->tasks()->active()->paginate(10);
        $tasks=Auth::user()->tasks()->paginate(10);
        return view('task.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // $task=Tasks::create();
        // $task->user_id=$request->user_id;//Auth::id();
        // $task->title=$request->title;
        // $task->description=$request->description;
        Tasks::create(['user_id'=> Auth::id(),
                        'title'=>$request->title,
                        'description'=>$request->description,             
        
    ]);
        //Tasks::create($request->all());//$params
        //Tasks::
       // $task->save();
        return redirect()->route('tasks.index',);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $task)
    {
        return view('task.form',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $task)
    {
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();
       return redirect()->route('tasks.index');
    }
}
