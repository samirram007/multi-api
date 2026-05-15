<?php
namespace App\Enums;


enum NationalityEnum: string
{

    case INDIAN = 'indian';
    case BANGLADESHIS = 'bangladeshis';
    case BHUTANESE = 'bhutanese';
    case NEPALESE = 'nepalese';
    case OTHER = 'other';

    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
    public static function default(): string
    {
        return NationalityEnum::INDIAN->value;
    }
}
