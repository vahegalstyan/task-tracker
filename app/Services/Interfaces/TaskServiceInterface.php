<?php

namespace App\Services\Interfaces;

use App\Entities\CreateTaskEntity;
use App\Entities\TaskEntity;
use App\Entities\TaskFilterEntity;
use App\Entities\UpdateTaskEntity;
use App\Enums\TaskStatusEnum;
use App\Models\User;
use Faker\Core\Uuid;
use Illuminate\Support\Collection;

interface TaskServiceInterface
{
    public function getTasks(?TaskFilterEntity $taskFilterEntity) : Collection;

    public function updateTask(UpdateTaskEntity $updateTaskEntity) : TaskEntity;

    public function createTask(CreateTaskEntity $createTaskEntity) : TaskEntity;

}
