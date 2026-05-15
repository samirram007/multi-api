<?php
namespace App\Enums;


enum LanguageEnum: string
{
    case English = 'en';
    case Bengali = 'bn';
    case Hindi = 'hi';
    case Arabic = 'ar';
    case French = 'fr';
    case Spanish = 'es';
    case German = 'de';
    case Portuguese = 'pt';
    case Italian = 'it';

    case Russian = 'ru';
    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
    public static function default(): string
    {
        return LanguageEnum::English->value;
    }
}
