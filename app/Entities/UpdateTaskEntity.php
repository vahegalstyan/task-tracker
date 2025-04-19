<?php

namespace App\Entities;

use App\DTOs\UpdateTaskDTO;
use App\Enums\TaskStatusEnum;

/**
 *
 */
class UpdateTaskEntity extends Entity
{
    /**
     * @var TaskStatusEnum|null
     */
    private ?TaskStatusEnum $status;

    /**
     * @var string
     */
    private string $id;
    /**
     * @var int|null
     */
    private ?int $assignedUserId;

    /**
     * @param string $id
     * @param ?TaskStatusEnum $status
     * @param int|null $assignedUserId
     */
    public function __construct(string $id, ?TaskStatusEnum $status, ?int $assignedUserId)
    {
        $this->id = $id;
        $this->status = $status;
        $this->assignedUserId = $assignedUserId;
    }

    /**
     * @return ?TaskStatusEnum
     */
    public function getStatus(): ?TaskStatusEnum
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getAssignedUserId(): ?int
    {
        return $this->assignedUserId;
    }

    /**
     * @param UpdateTaskDTO $dto
     * @return self
     */
    public static function fromDTO(UpdateTaskDTO $dto): self
    {
        return new self(
            id: $dto->getId(),
            status: $dto->getStatus(),
            assignedUserId: $dto->getAssignedUserId()

        );
    }

}
