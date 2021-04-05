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
    public function index(): TaskResourceCollection
    {
        $userId = Auth::user()->id;

        $tasks = Task::where('user_id', $userId)->get();

        return new TaskResourceCollection($tasks);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Requests\TaskRequest $taskRequest
     * @return TaskResourse
     */
    public function store(TaskStoreRequest $taskStoreRequest)
    {
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
        $this->validateIsAuthUserTask($task);
        return new TaskResource($task);
    }

    private function validateIsAuthUserTask(Task $task): bool
    {
        if ($task->user_id !== Auth::user()->id) {
            abort(403);
        }

        return true;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Task $task
     * @return TaskResource
     */
    public function update(Request $request, Task $task): TaskResource
    {
        $this->validateIsAuthUserTask($task);

        $task->update($request->all());

        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->validateIsAuthUserTask($task);

        $task->delete();

        return response()->json();
    }
}
