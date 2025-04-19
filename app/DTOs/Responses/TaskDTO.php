<?php

namespace App\DTOs\Responses;

use App\Entities\TaskEntity;
use App\Enums\TaskStatusEnum;
use DateTime;
use Illuminate\Support\Collection;

class TaskDTO
{

    /**
     * @param string $id
     * @param string $title
     * @param string $description
     * @param TaskStatusEnum $status
     * @param DateTime $createdAt
     * @param int|null $assignedUserId
     */
    public function __construct(
        string $id,
        string $title,
        string $description,
        TaskStatusEnum $status,
        DateTime $createdAt,
        ?int $assignedUserId = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->assignedUserId = $assignedUserId;
    }

    /**
     * @var string
     */
    public string $id;

    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $description;

    /**
     * @var TaskStatusEnum
     */
    public TaskStatusEnum $status;

    /**
     * @var int|null
     */
    public ?int $assignedUserId;


    /**
     * @var DateTime
     */
    public DateTime $createdAt;

    public static function fromEntity(TaskEntity $taskEntity): self
    {
        return new self(
            id: $taskEntity->getId(),
            title: $taskEntity->getTitle(),
            description: $taskEntity->getDescription(),
            status: $taskEntity->getStatus(),
            createdAt: $taskEntity->getCreatedAt(),
            assignedUserId: $taskEntity->getassignedUserId(),
        );
    }

    /**
     * @param Collection $tasks
     * @return Collection
     */
    public static function fromListEntity(Collection $tasks): Collection
    {
       return $tasks->map(function (TaskEntity $taskEntity) {
           return self::fromEntity($taskEntity);
       });
    }
}
