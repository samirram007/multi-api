<?php
namespace App\Enums;

enum DocumentPrivacyLevel: string
{
    case PUBLIC = 'public';
    case PRIVATE = 'private';
    case SHARED = 'shared';

    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
