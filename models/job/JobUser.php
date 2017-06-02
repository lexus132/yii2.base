<?php

namespace app\models\job;

use Yii;

/**
 * This is the model class for table "job_user".
 *
 * @property int $jobid
 * @property int $user_id
 * @property string $about
 * @property string $hobbies
 * @property string $references
 */
class JobUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['about', 'hobbies', 'references'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jobid' => 'Jobid',
            'user_id' => 'User ID',
            'about' => 'About myself',
            'hobbies' => 'Hobbies',
            'references' => 'References',
        ];
    }
}
