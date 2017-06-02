<?php

namespace app\models\job;

use Yii;

/**
 * This is the model class for table "job_skills".
 *
 * @property int $jobid
 * @property int $skills_place
 * @property string $description
 */
class JobSkills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobid', 'skills_place', 'description'], 'required'],
            [['jobid', 'skills_place'], 'integer'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jobid' => 'Jobid',
            'skills_place' => 'Skills Place',
            'description' => 'Description',
        ];
    }
}
