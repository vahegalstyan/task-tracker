<?php

namespace App\DTOs;

use App\Enums\TaskStatusEnum;
use App\Http\Requests\UpdateTasksRequest;


/**
 *
 */
class UpdateTaskDTO
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var TaskStatusEnum|null
     */
    private ?TaskStatusEnum $status;


    /**
     * @var int|null
     */
    private ?int $assignedUserId;

    /**
     * @param string $id
     * @param ?TaskStatusEnum $status
     * @param ?int $assignedUserId
     */
    public function __construct(string $id, ?TaskStatusEnum $status, ?int $assignedUserId)
    {
        $this->id = $id;
        $this->status = $status;
        $this->assignedUserId = $assignedUserId;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return TaskStatusEnum
     */
    public function getStatus(): ?TaskStatusEnum
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getAssignedUserId(): ?int
    {
        return $this->assignedUserId;
    }


    /**
     * @param UpdateTasksRequest $request
     * @param string $id
     * @return self
     */
    public static function fromRequest(UpdateTasksRequest $request, string $id): self
    {
        return new self(
            id: $id,
            status: $request->has('status') ? TaskStatusEnum::from($request->input('status')): null ,
            assignedUserId: $request->input('assignedUserId')

        );
    }
}
