<?php

namespace App\Statuses;

class InviteeTypes
{
    public const confirmed = 1;

    public const waiting = 2;

    public const rejected = 3;

    public static array $statuses = [self::confirmed , self::waiting, self::rejected];
}
