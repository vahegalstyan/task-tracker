<?php

namespace App\DTOs;

use App\Enums\TaskStatusEnum;
use App\Http\Requests\GetTasksRequest;
use Faker\Core\Uuid;

/**
 *
 */
class TaskFilterDTO
{
    /**
     * @var Uuid|null
     */
    private ?Uuid $assignedUserId;


    /**
     * @var TaskStatusEnum|null
     */
    private ?TaskStatusEnum $status;

    /**
     * @param Uuid|null $assignedUserId
     * @param TaskStatusEnum|null $status
     */
    public function __construct(?Uuid $assignedUserId, ?TaskStatusEnum $status)
    {
        $this->assignedUserId = $assignedUserId;
        $this->status = $status;
    }

    /**
     * @return Uuid|null
     */
    public function getAssignedUserId(): ?Uuid
    {
        return $this->assignedUserId;
    }

    /**
     * @return TaskStatusEnum|null
     */
    public function getStatus(): ?TaskStatusEnum
    {
        return $this->status;
    }


    /**
     * @param GetTasksRequest $request
     * @return self
     */
    public static function fromRequest(GetTasksRequest $request) :self
    {
        return new self(
            assignedUserId: $request->input('assignedUserId'),
            status: $request->input('status') ? TaskStatusEnum::tryFrom($request->input('status')): null
        );
    }
}
