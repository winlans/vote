<?php
/**
 * Created by PhpStorm.
 * User: raye
 * Date: 2018/3/15
 * Time: 15:58
 */

namespace app\util;

class UserUtil
{
    public static function encryptPassword($password, $algo = PASSWORD_BCRYPT, $option = [])
    {
        return password_hash($password, $algo, $option);
    }

    public static function verifyPassword($password_i, $password_o)
    {
        return password_verify($password_i, $password_o);
    }
}