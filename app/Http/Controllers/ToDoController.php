<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $toDos = ToDo::latest()
        ->paginate(10);
        return Inertia::render('ToDo/Index', [
            'toDos' => $toDos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ToDo/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationRules = [
            'title' => 'required',
            'description' => 'nullable',
        ];

        // Custom error messages for validation
        $customMessages = [
            'title.required' => 'Please provide a title.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Create a new model and populate it with validated data
        $toDo = new ToDo();
        $toDo->fill($validatedData);

        try {
            // Save the model
            if ($toDo->save()) {
                return redirect()->route('to-dos.index')->with('toastMessage', 'Task created successfully!')->with('toastStyle', 'success');
            } else {
                return redirect()->back()->withInput()->with('toastMessage', 'Failed to create Task.')->with('toastStyle', 'danger');
            }
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->withInput()->with('toastMessage', $e->getMessage())->with('toastStyle', 'danger');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDo $toDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDo $toDo)
    {
        return Inertia::render('ToDo/Edit', [
            'toDo' => $toDo,
        ]
    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToDo $toDo)
    {
        $validationRules = [
            'title' => 'required',
            'description' => 'nullable',
        ];

        // Custom error messages for validation
        $customMessages = [
            'title.required' => 'Please provide a title.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        $toDo->update($validatedData);

        try {
            // Save the model
            if ($toDo->save()) {
                return redirect()->route('to-dos.index')->with('toastMessage', 'Task updated successfully!')->with('toastStyle', 'success');
            } else {
                return redirect()->back()->withInput()->with('toastMessage', 'Failed to update Task.')->with('toastStyle', 'danger');
            }
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->withInput()->with('toastMessage', $e->getMessage())->with('toastStyle', 'danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $toDo)
    {
        try {
            $toDo->delete();
            return redirect()->route('to-dos.index')->with('toastMessage', 'Task deleted successfully!')->with('toastStyle', 'success');
        } catch (\Exception $e) {
            return redirect()->route('to-dos.index')->with('toastMessage', 'Error deleting task: ' . $e->getMessage())->with('toastStyle', 'danger');
        }
    }

    public function toggleStatus(Request $request, ToDo $toDo)
    {
        if ($request->input('completed') == 0) {
            $toDo->completed = 1;
            $message = 'Task marked as completed!';
        } else {
            $toDo->completed = 0;
            $message = 'Task marked as incomplete!';
        }

        if ($toDo->save()) {
            return redirect()->route('to-dos.index')->with('toastMessage', $message);
        } else {
            return redirect()->back()->with('toastMessage', 'Failed to update status.');
        }
    }
}
