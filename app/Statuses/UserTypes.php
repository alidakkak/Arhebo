<?php

namespace App\Statuses;

class UserTypes

{
    public const SUPER_ADMIN = 1;
    public const USER = 2;
    public const SUPPORT = 3;

    public static array $statuses = [self::SUPER_ADMIN, self::USER, self::SUPPORT];

}
