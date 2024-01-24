<?php

namespace App\Statuses;

class MessageTypes
{
    public const delete = 1;

    public const edit = 2;

    public static array $statuses = [self::delete, self::edit];
}
