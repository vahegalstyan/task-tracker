<?php

namespace App\Entities;

use App\DTOs\TaskFilterDTO;
use App\Enums\TaskStatusEnum;

/**
 *
 */
class TaskFilterEntity extends Entity
{

    /**
     * @var int|null
     */
    private ?int $assignedUserId;

    /**
     * @var TaskStatusEnum|null
     */
    private ?TaskStatusEnum $status;

    /**
     * @param int|null $assignedUserId
     * @param TaskStatusEnum|null $status
     */
    public function __construct(?int $assignedUserId, ?TaskStatusEnum $status)
    {
        $this->assignedUserId = $assignedUserId;
        $this->status = $status;
    }


    /**
     * @return TaskStatusEnum|null
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
     * @param TaskFilterDTO $taskFilterDTO
     * @return self
     */
    public static function fromDTO(TaskFilterDTO $taskFilterDTO): self
    {
        return new self(
            assignedUserId: $taskFilterDTO->getAssignedUserId(),
            status: $taskFilterDTO->getStatus()
        );
    }

}
