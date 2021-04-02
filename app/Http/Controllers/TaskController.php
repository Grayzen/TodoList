<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function index()
    {
        return Inertia::render('Tasks/Index', [
            'tasks' => Task::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
    {
        Auth::user()->tasks()->create(
            Request::validate([
                'name' => ['required', 'max:99'],
                'body' => ['required', 'max:999'],
            ])
        );

        return Redirect::route('tasks')->with('error', 'hata');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
    */

    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
    */

    public function edit(Task $task)
    {
        return Inertia::render('Tasks/Edit', [
            'task' => [
                'id' => $task->id,
                'user_id' => $task->user_id,
                'name' => $task->name,
                'body' => $task->body,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
    */

    public function update(Request $request, Task $task)
    {
        $task->update(
            Request::validate([
                'name' => ['required', 'max:99'],
                'body' => ['required', 'max:999'],
            ])
        );

        return Redirect::back()->with('success', 'Organization updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
    */

    public function destroy(Task $task)
    {
        $task->delete();

        return Redirect::back()->with('success', 'Task deleted.');
    }
}
