<?php

namespace app\models\job;

use Yii;

/**
 * This is the model class for table "job_experience_duties".
 *
 * @property int $experienceid
 * @property string $description
 */
class JobExperienceDuties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_experience_duties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['experienceid', 'description'], 'required'],
            [['experienceid'], 'integer'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'experienceid' => 'Experienceid',
            'description' => 'Description',
        ];
    }
}
