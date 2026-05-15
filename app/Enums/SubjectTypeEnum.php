<?php
namespace App\Enums;


enum SubjectTypeEnum: string
{
    case THEORY = 'theory';
    case PRACTICAL = 'practical';
    case THEORYnPRACTICAL = 'theory+practical';
    case SUBJECTIVE = 'subjective';
    case OBJECTIVE = 'objective';


    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
    public static function default(): string
    {
        return SubjectTypeEnum::THEORY->value;
    }
}
