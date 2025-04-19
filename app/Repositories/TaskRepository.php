<?php

namespace App\Repositories;

use App\Entities\CreateTaskEntity;
use App\Entities\TaskEntity;
use App\Entities\TaskFilterEntity;
use App\Entities\UpdateTaskEntity;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Faker\Core\Uuid;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;


/**
 *
 */
class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var string
     */
    private string $cacheKey = 'tasks';
    /**
     * @var Collection
     */
    private Collection $tasks;

    /**
     *
     */
    public function __construct()
    {
        $this->tasks = Cache::get($this->cacheKey, collect());
    }

    /**
     * @param TaskFilterEntity|null $filter
     * @return Collection
     */
    public function findAll(?TaskFilterEntity $filter = null): Collection
    {
        return $this->tasks->filter(
            function (TaskEntity $task) use ($filter) {
                if ($filter === null) {
                    return true;
                }
                if ($filter->getAssignedUserId() && $filter->getAssignedUserId() !== $task->getassignedUserId()) {
                    return false;
                }

                if ($filter->getStatus() && $filter->getStatus() !== $task->getStatus()) {
                    return false;
                }

                return true;
            }

        )->collect();

    }

    /**
     * @param CreateTaskEntity $createTaskEntity
     * @return TaskEntity
     */
    public function create(CreateTaskEntity $createTaskEntity) :TaskEntity
    {
        $taskEntity =$this->generateTaskEntityFromCreateTaskEntity($createTaskEntity);
        $this->tasks->put($taskEntity->getId(), $taskEntity);

        Cache::put($this->cacheKey, $this->tasks);

        return $taskEntity;
    }

    /**
     * @param CreateTaskEntity $createTaskEntity
     * @return TaskEntity
     */
    private function generateTaskEntityFromCreateTaskEntity(CreateTaskEntity $createTaskEntity): TaskEntity
    {
        return new TaskEntity(
            id: (new Uuid())->uuid3(),
            title: $createTaskEntity->getTitle(),
            description: $createTaskEntity->getDescription(),
            status: $createTaskEntity->getStatus(),
            createdAt: new \DateTime(),
            assignedUserId: $createTaskEntity->getassignedUserId(),
        );

    }


    /**
     * @param UpdateTaskEntity $updateTaskEntity
     * @return TaskEntity
     */
    public function update(UpdateTaskEntity $updateTaskEntity): TaskEntity
    {


       $taskEntity = $this->tasks->get($updateTaskEntity->getId());

        if ($taskEntity) {
            if ($updateTaskEntity->getStatus()) {
                $taskEntity->setStatus($updateTaskEntity->getStatus());
            }
            if ($updateTaskEntity->getAssignedUserId()) {
                $taskEntity->setAssignedUserId($updateTaskEntity->getAssignedUserId());
            }
        }
        Cache::put($this->cacheKey, $this->tasks);
        return $taskEntity;
    }



}
