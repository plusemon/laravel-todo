<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index()
    {

        $todos = Todo::all();
        return view('todos.index', compact('todos'));

    }


    public function show(Todo $todo)
    {
        echo "emon";

    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5|max:30',
            'description' => 'required|min:5'
        ];
        $this->validate($request, $rules);
        Todo::create($request->all());
        return redirect('/')->with('success','New Todo Created Successfully');
    }


    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }


    public function update(Request $request, Todo $todo)
    {
        
        $rules = [
            'name' => 'required|min:5|max:30',
            'description' => 'required|min:5'
        ];
        $this->validate($request, $rules);
        $todo->update($request->all());
        return redirect('/')->with('success','Todo Updated Successfully');
    }
    
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/')->with('success','Todo Deleted Successfully');
        
    }

    public function completed(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();
        return redirect('/')->with('success','Todo Completed Successfully');
        
    }

    public function restore(Todo $todo)
    {
        $todo->completed = false;
        $todo->save();
        return redirect('/')->with('success','Todo Restored Successfully');
        
    }
}
