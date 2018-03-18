<?php
/**
 * Created by PhpStorm.
 * User: winlans
 * Date: 2018/3/17
 * Time: 8:48
 */
namespace app\util;
class StringUtil
{
    public static function filterUserName($username)
    {
        return strtolower(trim($username));
    }

    public static function encryptPassword($password, $algo = PASSWORD_BCRYPT, $option = [])
    {
        return password_hash($password, $algo, $option);
    }

    public static function verifyPassword($password_i, $password_o)
    {
        return password_verify($password_i, $password_o);
    }

}