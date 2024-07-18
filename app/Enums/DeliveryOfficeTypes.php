<?php

namespace App\Enums;

/**
 * List of delivery posts
 */
class DeliveryOfficeTypes
{
    /** @var string */
    const NOVA_POST = 'nova_post';

    public static function toArray(): array
    {
        return [
            self::NOVA_POST,
        ];
    }
}
