<?php

namespace App\Http\Controllers\Api;

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
    public function index(): TaskResourceCollection
    {   
        if (!Auth::user()) {
            abort('404');
        }

        $userId = Auth::user()->id;

        $tasks = Task::where('user_id', $userId)->orderBy('id','DESC')->get();

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
        if (!Auth::user()) {
            abort('404');
        }

        $userId = Auth::user()->id;

        $task = new Task();
        $task->user_id = $userId;
        $task->fill($taskStoreRequest->all());
        $task->save();

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
        $this->validateAuthUserTask($task);

        return new TaskResource($task);
    }

    private function validateAuthUserTask($task)
    {
        if ($task->user_id !== Auth::user()->id) {
            abort(403);
        }

        return true;
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
        $this->validateAuthUserTask($task);

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
        $this->validateAuthUserTask($task);

        $task->delete();

        return response()->json();
    }
}
