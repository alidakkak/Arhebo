<?php

namespace App\Statuses;

class CategoryTypes

{
    public const WEDDING = 1;
    public const BABY = 2;
    public const BUSINESS = 3;
    public const SAVE_THE_DATE = 4;
    public const BRIDAL_SHOWER = 5;
    public const BIRTHDAY = 6;
    public const GRADUATION = 7;
    public const ENTERTAINING = 8;


    public static array $statuses = [ self::WEDDING,self::BABY,self::BUSINESS,self::SAVE_THE_DATE
                                    ,self::BRIDAL_SHOWER, self::BIRTHDAY,self::GRADUATION,self::ENTERTAINING];

}
