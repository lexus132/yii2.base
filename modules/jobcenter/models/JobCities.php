<?php

namespace app\modules\jobcenter\models;

use Yii;

/**
 * This is the model class for table "job_cities".
 *
 * @property integer $id
 * @property string $city
 */
class JobCities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city'], 'required'],
            [['city'], 'string', 'max' => 255],
	    [['city'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => Yii::t('JOBCENTERModule.jobcities_model', 'City'),
        ];
    }
}
