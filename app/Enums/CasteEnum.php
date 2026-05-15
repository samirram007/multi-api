<?php
namespace App\Enums;


enum CasteEnum: string
{
    case GENERAL = 'general';


    case SC = 'sc';
    case ST = 'st';
    case OBC = 'obc';
    case OTHER = 'other';
    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
    public static function default(): string
    {
        return CasteEnum::GENERAL->value;
    }
}
