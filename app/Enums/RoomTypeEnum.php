<?php
namespace App\Enums;

use Illuminate\Support\Str;


enum RoomTypeEnum: string
{

    case CLASS_ROOM = "class_room";
    case SCIENCE_LAB = "science_lab";
    case COMPUTER_LAB = "computer_lab";
    case GYMNASIUM = "gymnasium";
    case AUDITORIUM = "auditorium";
    case ART_ROOM = "art_room";
    case MUSIC_ROOM = "music_room";
    case CAFETERIA = "cafeteria";
    case ADMIN_OFFICE = "admin_office";
    case LIBRARY = "library";
    case WASH_ROOM = "wash_room";
    case SPECIAL_EDUCATION_ROOM = "special_education_room";
    case RESOURCE_ROOM = "resource_room";

    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
    public static function default(): string
    {
        return RoomTypeEnum::CLASS_ROOM->value;
    }
}
