<?php

namespace App\Statuses;

class MessageTypes
{
    public const deleted = 1;

    public const updated = 2;

    public static array $statuses = [self::deleted, self::updated];
}
