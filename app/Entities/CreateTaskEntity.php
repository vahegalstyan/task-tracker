<?php

namespace App\Entities;

use App\DTOs\CreateTaskDTO;
use App\Enums\TaskStatusEnum;

class CreateTaskEntity extends Entity
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
     * @var TaskStatusEnum
     */
    private TaskStatusEnum $status;

    /**
     * @var int|null
     */
    private ?int $assignedUserId;

    /**
     * @param string $title
     * @param string $description
     * @param TaskStatusEnum $status
     * @param int|null $assignedUserId
     */
    public function __construct(string $title, string $description, TaskStatusEnum $status, ?int $assignedUserId)
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
     * @return TaskStatusEnum
     */
    public function getStatus(): TaskStatusEnum
    {
        return $this->status;
    }

    /**
     * @return int|null
     */
    public function getassignedUserId(): ?int
    {
        return $this->assignedUserId;
    }


    public static function fromDTO(CreateTaskDTO $dto): self
    {
        return new self(
            title: $dto->getTitle(),
            description: $dto->getDescription(),
            status: $dto->getStatus() ?? TaskStatusEnum::TODO,
            assignedUserId: $dto->getAssignedUserId(),

        );
    }

    public function jsonSerialize(): array
    {
        return collect((new \ReflectionClass($this))->getProperties())
            ->mapWithKeys(function ($property) {
                $property->setAccessible(true);
                $value = $property->getValue($this);

                if ($value instanceof \DateTimeInterface) {
                    $value = $value->format('Y-m-d H:i:s');
                }

                return [$property->getName() => $value];
            })
            ->toArray();
    }

}
