<?php

namespace App\Http\Controllers;

use App\DTOs\CreateTaskDTO;
use App\DTOs\Responses\TaskDTO;
use App\DTOs\TaskFilterDTO;
use App\DTOs\UpdateTaskDTO;
use App\Entities\CreateTaskEntity;
use App\Entities\TaskFilterEntity;
use App\Entities\UpdateTaskEntity;
use App\Http\Requests\CreateTasksRequest;
use App\Http\Requests\GetTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use App\Services\Interfaces\TaskServiceInterface;

class TaskController extends Controller
{

    /**
     * @var TaskServiceInterface
     */
    private TaskServiceInterface $taskService;

    /**
     * @param TaskServiceInterface $taskService
     */
    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(GetTasksRequest $request)
    {
        $taskFilterEntity = null;
        if(!blank($request->all())) {
            $taskFilterDTO = TaskFilterDTO::fromRequest($request);
            $taskFilterEntity = TaskFilterEntity::fromDTO($taskFilterDTO);
        }
        $tasks = $this->taskService->getTasks($taskFilterEntity);

        $tasksDTOs = TaskDTO::fromListEntity($tasks);

        return response()->json($tasksDTOs->values());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTasksRequest $request)
    {
        $createTaskDTO = CreateTaskDTO::fromRequest($request);
        $createEntity = CreateTaskEntity::fromDTO($createTaskDTO);

        $taskEntity = $this->taskService->createTask($createEntity);
        $taskDTO = TaskDTO::fromEntity($taskEntity);

        return response()->json($taskDTO, 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request, string $id)
    {

        $updateTaskDTO = UpdateTaskDTO::fromRequest($request, $id);
        $updateTaskEntity = UpdateTaskEntity::fromDTO($updateTaskDTO);

        $taskEntity = $this->taskService->updateTask($updateTaskEntity);

        $taskDto = TaskDTO::fromEntity($taskEntity);

        return response()->json($taskDto, 200);
    }

}
