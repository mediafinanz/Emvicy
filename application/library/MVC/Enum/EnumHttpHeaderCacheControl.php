<?php

namespace MVC\Enum;

enum EnumHttpHeaderCacheControl
{
    case NoCache;
    case NoStore;
    case MustRevalidate;

    /**
     * @return string
     */
    public function value(): string
    {
        return match($this)
        {
            self::NoCache => 'no-cache',
            self::NoStore => 'no-store',
            self::MustRevalidate => 'must-revalidate',
        };
    }
}