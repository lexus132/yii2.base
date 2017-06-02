<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Twel extends Model
{
    public $name;
    public $email;
    public $file;

    public function rules()
    {
        return [
            [['name', 'email'], 'required', 'message' => 'What a fuck'],
            ['email', 'email', 'message' => 'are you stuped?'],
            ['name', 'string', 'max' => 40],
            ['file', 'file', 'extensions' => 'png, jpg', 'message' => 'What a fuck'],
//            ['verifyCode', 'captcha'],
        ];
    }


}
