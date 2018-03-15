<?php
/**
 * Created by PhpStorm.
 * User: raye
 * Date: 2018/3/15
 * Time: 17:19
 */
namespace app\util;

class Security
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