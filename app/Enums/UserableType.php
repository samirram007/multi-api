<?php
namespace App\Enums;

enum UserableType: string
{
    case Admin = 'admin';

    case DEVELOPER = 'developer';
    case SUPER_ADMIN = 'super_admin';
    case STUDENT = 'student';
    case GUARDIAN = 'guardian';
    case TEACHER = 'teacher';
    case Employee = 'employee';
    case Customer = 'customer';
    case Supplier = 'supplier';
    case Vendor = 'vendor';
    case Client = 'client';
    case Contractor = 'contractor';
    case Partner = 'partner';
    case Agent = 'agent';
    case TRANSPORT_OWNER = 'transport_owner';
    case DRIVER = 'driver';
    case MANAGER = 'manager';
    case PARENT = 'parent';
    case FACULTY = 'faculty';

    case Other = 'other';
    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
