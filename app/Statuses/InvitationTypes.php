<?php

namespace App\Statuses;

class InvitationTypes
{
    public const active = 1;

    public const done = 2;

    public const deleted = 3;

    public static array $statuses = [self::active, self::deleted, self::done];
}
