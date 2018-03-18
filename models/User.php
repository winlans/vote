<?php

namespace app\models;

use app\util\StringUtil;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{


    /**
     * Finds user by username
     *
     * @param string $username
     * @return $this
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['username' => $username, 'status' => 1])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    public function getPassword(){
        return $this->password;
    }


    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return StringUtil::verifyPassword($password, $this->password);
    }
}
