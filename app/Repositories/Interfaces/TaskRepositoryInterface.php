<?php

namespace App\Repositories\Interfaces;

use App\Entities\CreateTaskEntity;
use App\Entities\TaskEntity;
use App\Entities\TaskFilterEntity;
use App\Entities\UpdateTaskEntity;
use Illuminate\Support\Collection;


/**
 *
 */
interface TaskRepositoryInterface
{
    /**
     * @param UpdateTaskEntity $updateTaskEntity
     * @return TaskEntity
     */
    public function update(UpdateTaskEntity $updateTaskEntity): TaskEntity;

    /**
     * @param CreateTaskEntity $createTaskEntity
     * @return TaskEntity
     */
    public function create(CreateTaskEntity $createTaskEntity): TaskEntity;

    /**
     * @param TaskFilterEntity|null $filter
     * @return Collection
     */
    public function findAll(?TaskFilterEntity $filter = null) : Collection;

}
