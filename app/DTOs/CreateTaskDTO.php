<?php

namespace App\DTOs;

use App\Enums\TaskStatusEnum;
use App\Http\Requests\CreateTasksRequest;

/**
 *
 */
class CreateTaskDTO
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var TaskStatusEnum|null
     */
    private ?TaskStatusEnum $status;

    /**
     * @var int|null
     */
    private ?int $assignedUserId;

    /**
     * @param string $title
     * @param string $description
     * @param ?TaskStatusEnum $status
     * @param int|null $assignedUserId
     */
    public function __construct(string $title, string $description, ?TaskStatusEnum $status, ?int $assignedUserId)
    {
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->assignedUserId = $assignedUserId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return ?TaskStatusEnum
     */
    public function getStatus(): ?TaskStatusEnum
    {
        return $this->status;
    }

    /**
     * @return int|null
     */
    public function getAssignedUserId(): ?int
    {
        return $this->assignedUserId;
    }


    /**
     * @param CreateTasksRequest $request
     * @return self
     */
    public static function fromRequest(CreateTasksRequest $request): self
    {
        return new self(
            title: $request->input('title'),
            description: $request->input('description'),
            status: TaskStatusEnum::tryFrom($request->input('status')),
            assignedUserId: $request->input('assignedUserId')
        );
    }
}
