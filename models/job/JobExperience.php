<?php

namespace app\models\job;

use Yii;

/**
 * This is the model class for table "job_experience".
 *
 * @property int $experienceid
 * @property int $categories
 * @property int $jobid
 * @property string $title
 * @property string $position
 * @property int $hiring
 * @property int $today
 * @property int $dismissal
 */
class JobExperience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categories', 'jobid', 'title', 'position', 'hiring'], 'required'],
            [['categories', 'jobid', 'hiring', 'today', 'dismissal'], 'integer'],
            [['title', 'position'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'experienceid' => 'Experienceid',
            'categories' => 'Categories',
            'jobid' => 'Jobid',
            'title' => 'Title',
            'position' => 'Position',
            'hiring' => 'Hiring',
            'today' => 'Today',
            'dismissal' => 'Dismissal',
        ];
    }
}
