<?php

namespace MVC\Enum;

enum EnumRequestMethod
{
    case GET;
    case DELETE;
    case TRACE;
    case PUT;
    case POST;
    case PATCH;
    case OPTIONS;

    /**
     * @return string
     */
    public function value(): string
    {
        return match($this)
        {
            self::GET => 'GET',
            self::DELETE => 'DELETE',
            self::TRACE => 'TRACE',
            self::PUT => 'PUT',
            self::POST => 'POST',
            self::PATCH => 'PATCH',
            self::OPTIONS => 'OPTIONS',
        };
    }
}
