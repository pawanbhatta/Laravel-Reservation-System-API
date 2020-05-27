<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskResource::collection(auth()->user()->tasks()->with('creater')->latest()->get());
        // return TaskResource::collection(Task::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:6'
        ]);

        $input = $request->all();

        if($request->has('due')){
            $input['due'] = Carbon::parse($request->due)->toDateTimeString();
        }

        $task = auth()->user()->tasks()->create($request->all());
        return new TaskResource($task->load('creater'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return new TaskResource($task->load('creater'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|min:6'
        ]);

        $input = $request->all();

        if($request->has('due')){
            $input['due'] = Carbon::parse($request->due)->toDateTimeString();
        }

        $task->update($input);
        return new TaskResource($task->load('creater'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response(['message' => 'Task Deleted']);
    }
}