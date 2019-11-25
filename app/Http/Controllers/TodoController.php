<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todo = Todo::orderBy('created_at', 'desc')->paginate(10);
        return view('index')->with('todos', $todo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // form validation
        $validator = Validator::make($request->all(), [
            'task_name'          => 'required|max:150',
            'task_description'   => 'required|max:250'
        ]);

        $errors = array('errors' => $validator->messages());

        if($validator->fails()) {
            return redirect()->back()->with($errors);
        }

        // new record save
        $todo = new Todo;
        $todo->task_name = $request->task_name;
        $todo->task_description = $request->task_description;
        $todo->save();

        // message
        $message = array('message' => 'New Task Added');
        return redirect()->route('todo.index')->with($message);
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
        //
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
        //
        $todo = Todo::findOrFail($id);
        $todo->task_status = "completed";
        $todo->save();

        $message = array('message' => 'Task Updated');
        return redirect()->route('todo.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $todo = Todo::findOrFail($id);
        $todo->delete();

        $message = array('message' => 'Task Deleted');
        return redirect()->route('todo.index')->with($message);
    }
}
