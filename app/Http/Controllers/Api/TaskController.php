<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskResourceCollection;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TaskResourceCollection
     */
    public function index():TaskResourceCollection
    {
        $userId = Auth::user()->id;

        $user = User::find($userId);
        
        $tasks = $user->tasks();

        return new TaskResourceCollection($tasks);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\TaskRequest  $taskRequest
     * @return TaskResourse
     */
    public function store(TaskStoreRequest $taskStoreRequest)
    {
        $task = Task::create($taskStoreRequest->all());

        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  $task
     * @return TaskResource
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Task $task
     * @return TaskResource
     */
    public function update(Request $request, Task $task): TaskResource
    {
        $task->update($request->all());

        return new TaskResource($task);
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

        return response()->json();
    }
}
