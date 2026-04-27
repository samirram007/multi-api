<?php
namespace App\Enums;

enum MenuType: string
{

    case Group = 'group';
    case MenuGroup = 'menu_group';
    case MenuItem = 'menu_item';

    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }


}
