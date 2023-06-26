<?php

namespace App\Enums;

class TaskStatus
{
    public const TODO = 'to-do';
    public const IN_PROGRESS = 'in-progress';
    public const DONE = 'done';

    public static function values()
    {
        return [
            self::TODO,
            self::IN_PROGRESS,
            self::DONE,
        ];
    }
}


