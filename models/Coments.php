<?php

namespace app\models;

use Yii;
//use Yii\db\ActiveRecord;

class Coments extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'coments';
    }

    public function rules()
    {
        return [
            [['text', 'name'],  'required', 'message' => 'Error mather fucka'],
            [['text'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text' => 'Text',
        ];
    }
}
