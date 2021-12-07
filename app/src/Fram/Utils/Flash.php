<?php

namespace App\Fram\Utils;

class Flash
{
    public static function setFlash(string $channel, string $message): void
    {
        $_SESSION[$channel] = htmlspecialchars($message);
    }

    public static function hasFlash(string $channel): bool
    {
        return isset($_SESSION[$channel]);
    }

    public static function getFlash(string $channel)
    {
        if (self::hasFlash($channel)) {
            $message = $_SESSION[$channel];
            unset($_SESSION[$channel]);
        }

        return $message;
    }
}