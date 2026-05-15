<?php
namespace App\Enums;


enum ReligionEnum: string
{
    case HINDU = 'hindu';
    case MUSLIM = 'muslim';
    case SIKH = 'sikh';
    case CHRISTIAN = 'christian';
    case BUDDHIST = 'buddhist';
    case JAIN = 'jain';
    case OTHER = 'other';
    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
    public static function default(): string
    {
        return ReligionEnum::HINDU->value;
    }
}
