<?php

namespace App\Libraries;

class Hash
{
    // Encrypt user password

    public static function encrypt($password)
    {
        return password_hash($passord, PASSWORD_BCRYPT);
    }
}