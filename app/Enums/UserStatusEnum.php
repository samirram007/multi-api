<?php
namespace App\Enums;


enum UserStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case DELETED = 'deleted';
    case BLOCKED = 'blocked';
    case SUSPENDED = 'suspended';

    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
    public static function default(): string
    {
        return UserStatusEnum::ACTIVE->value;
    }
}
