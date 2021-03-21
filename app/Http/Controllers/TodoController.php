<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        // GET ALL MODEL
        $todo = Todo::all();

        // RETURN TO INDEX VIEW WITH MODEL COLLECTION
        return view('todo.index', compact('todo'));
    }


    public function show(Todo $todo)
    {
        // RETURN TO SHOW VIEW
        return view('todo.show');
    }

    public function create()
    {
        // RETURN TO CREATE VIEW
        return view('todo.create');
    }

    public function store(Request $request)
    {
        // VALIDATE REQUEST
        $this->validate($request, [
            'name' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:5'
        ]);

        // MODEL INSTANCE
        $newTodo = new Todo();
        $newTodo->name = $request->name;
        $newTodo->description = $request->description;

        // SAVE MODEL
        $save = $newTodo->save();

        // SET ALERT MESSAGE
        if ($save) {
            $alert = 'success';
            $message = 'Todo Created Successfully';
        } else {
            $alert = 'error';
            $message = 'Something Went Wrong';
        }

        // REDIRECT TO INDEX WITH ALERT MESSAGE
        return redirect()->route('todo.index')->with($alert, $message);
    }


    public function edit(Todo $todo)
    {
        // RETURN TO EDIT VIEW WITH MODEL
        return view('todo.edit', compact('todo'));
    }


    public function update(Request $request, Todo $todo)
    {
        if ($request->has('completed')) {
            return $this->markCompleted($todo);
        }

        // VALIDATE REQUEST
        $this->validate($request, [
            'name' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:5'
        ]);

        // MODIFY MODEL
        $todo->name = $request->name;
        $todo->description = $request->description;

        // SAVE MODEL
        $save = $todo->save();

        // SET ALERT MESSAGE
        if ($save) {
            $alert = 'success';
            $message = 'Todo Updated Successfully';
        } else {
            $alert = 'error';
            $message = 'Something Went Wrong';
        }

        // REDIRECT TO INDEX VIEW WITH ALERT MESSAGE
        return redirect()->route('todo.index')->with($alert, $message);
    }

    public function destroy(Todo $todo)
    {
        // DELETE MODEL
        $delete = $todo->delete();

        // SET ALERT MESSAGE
        if ($delete) {
            $alert = 'success';
            $message = 'Todo Deleted Successfully';
        } else {
            $alert = 'error';
            $message = 'Something went wrong';
        }

        // REDIRECT BACK WITH ALERT MESSAGE
        return back()->with($alert, $message);
    }

    public function completed(Todo $todo)
    {

        // MODIFY MODEL
        $todo->completed = true;

        // SAVE MODEL
        $save = $todo->save();

        // SET ALERT MESSAGE
        if ($save) {
            $alert = 'success';
            $message = 'Todo Completed Successfully';
        } else {
            $alert = 'error';
            $message = 'Something Went Wrong';
        }

        // REDIRECT BACK VIEW WITH ALERT MESSAGE
        return back()->with($alert, $message);
    }

    public function restore(Todo $todo)
    {
        // MODIFY MODEL
        $todo->completed = false;

        // SAVE MODEL
        $save = $todo->save();

        // SET ALERT MESSAGE
        if ($save) {
            $alert = 'success';
            $message = 'Todo Undo Successfully';
        } else {
            $alert = 'error';
            $message = 'Something Went Wrong';
        }

        // REDIRECT BACK VIEW WITH ALERT MESSAGE
        return back()->with($alert, $message);
    }

}
