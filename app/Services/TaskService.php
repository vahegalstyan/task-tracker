<?php

namespace App\Services;

use App\Entities\CreateTaskEntity;
use App\Entities\TaskEntity;
use App\Entities\TaskFilterEntity;
use App\Entities\UpdateTaskEntity;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Services\Interfaces\TaskServiceInterface;
use Illuminate\Support\Collection;

class TaskService extends Service implements TaskServiceInterface
{
    private TaskRepositoryInterface $taskRepository;

    /**
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }


    public function getTasks(?TaskFilterEntity $taskFilterEntity): Collection
    {
        return $this->taskRepository->findAll($taskFilterEntity);
    }

    public function updateTask(UpdateTaskEntity $updateTaskEntity): TaskEntity
    {
      return $this->taskRepository->update($updateTaskEntity);
    }

    public function createTask(CreateTaskEntity $createTaskEntity): TaskEntity
    {
      return $this->taskRepository->create($createTaskEntity);
    }



}
