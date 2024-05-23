<?php

namespace Hkipngetich\PasswordVerify;

use InvalidArgumentException;

class PasswordValidator
{
    public static function hashPassword($input_password)
    {
        if (empty($input_password)) {
            throw new InvalidArgumentException('Input password must have a value.');
        }
        return password_hash($input_password, PASSWORD_DEFAULT);
    }

    public static function validatePassword($input_password, $stored_password)
    {
        if (empty($input_password) || empty($stored_password)) {
            throw new InvalidArgumentException('Input password and stored password must have a value.');
        }
        if (password_verify($input_password, $stored_password)) {
            return true;
        }
        return false;
    }
}