<?php

namespace App\Exceptions;

class TaskNotFoundException extends \Exception
{
    protected $message = 'Task not found';
}
