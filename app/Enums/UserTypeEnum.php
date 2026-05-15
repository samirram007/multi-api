<?php
namespace App\Enums;


enum UserTypeEnum: string
{
    case ADMIN = 'admin';
    case DEVELOPER = 'developer';
    case SUPER_ADMIN = 'super_admin';
    case STUDENT = 'student';
    case GUARDIAN = 'guardian';
    case TEACHER = 'teacher';
    case EMPLOYEE = 'employee';
    case TRANSPORT_OWNER = 'transport_owner';
    case DRIVER = 'driver';
    case MANAGER = 'manager';
    case PARENT = 'parent';
    case FACULTY = 'faculty';

    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
    public static function default(): string
    {
        return UserTypeEnum::ADMIN->value;
    }
}
