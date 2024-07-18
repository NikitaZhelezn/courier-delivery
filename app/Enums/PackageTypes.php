<?php

namespace App\Enums;

/**
 * Type of packages that can be used for the delivery as information about it.
 * Can be expanded in future
 */
class PackageTypes
{
    /** @var string */
    const NORMAL = 'normal';

    /** @var string */
    const FRAGILE = 'fragile';

    public static function toArray(): array
    {
        return [
            self::NORMAL,
            self::FRAGILE,
        ];
    }
}
