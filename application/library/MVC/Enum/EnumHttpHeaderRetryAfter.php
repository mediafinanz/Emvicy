<?php

namespace MVC\Enum;

enum EnumHttpHeaderRetryAfter
{
    case UnixTimestamp;
    case RetryAfterSeconds;

    /**
     * @return string
     */
    public function value(): string
    {
        return match($this)
        {
            self::UnixTimestamp => 'UnixTimestamp',
            self::RetryAfterSeconds => 'RetryAfterSeconds',
        };
    }
}