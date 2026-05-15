<?php
namespace App\Enums;

enum GenderEnum: string
{

    case MALE = 'male';
    case FEMALE = 'female';
    case OTHER = 'other';
    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
    public static function default(): string
    {
        return GenderEnum::MALE->value;
    }

}
