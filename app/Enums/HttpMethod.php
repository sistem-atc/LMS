<?php

namespace App\Enums;

enum HttpMethod: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
    case PATCH = 'PATCH';

    public static function isValid(string $method): bool
    {
        return in_array($method, array_map(fn($case) => $case->value, self::cases()));
    }
}
