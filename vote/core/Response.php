<?php
/**
 * Created by PhpStorm.
 * User: winlans
 * Date: 2018/3/17
 * Time: 9:22
 */
namespace app\vote\core;

class Response{

    const SUCCESS = 1;
    const FAILED = 0;
    public static function send($code, $message, $data = []){
        return json_encode(array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        ));

    }

}