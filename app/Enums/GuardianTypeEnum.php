<?php

namespace App\Enums;


enum GuardianTypeEnum: string
{
    case FATHER = 'father';
    case MOTHER = 'mother';
    case OTHER = 'other';
    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
    public static function default(): string
    {
        return GuardianTypeEnum::FATHER->value;
    }
}
