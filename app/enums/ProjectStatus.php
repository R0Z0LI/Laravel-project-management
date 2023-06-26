<?php

namespace App\Enums;

class ProjectStatus
{
    public const ACTIVE = "active";
    public const COMPLETED = "completed";

    public static function values()
    {
        return [
            self::ACTIVE,
            self::COMPLETED,
        ];
    }
}


