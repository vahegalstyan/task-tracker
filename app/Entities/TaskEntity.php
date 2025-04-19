<?php

namespace App\Entities;


use DateTime;
use App\Enums\TaskStatusEnum;
/**
 *
 */
class TaskEntity extends Entity
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
    private string $id;

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
     * @var DateTime
     */
    private Datetime $createdAt;

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
     * @return TaskStatusEnum
     */
    public function getStatus(): TaskStatusEnum
    {
        return $this->status;
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
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param TaskStatusEnum $status
     */
    public function setStatus(TaskStatusEnum $status): void
    {
        $this->status = $status;
    }

    /**
     * @param int|null $assignedUserId
     */
    public function setAssignedUserId(?int $assignedUserId): void
    {
        $this->assignedUserId = $assignedUserId;
    }



}
