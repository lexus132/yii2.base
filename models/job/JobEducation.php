<?php

namespace app\models\job;

use Yii;

/**
 * This is the model class for table "job_education".
 *
 * @property int $jobid
 * @property string $university
 * @property string $major
 * @property int $admission
 * @property int $lern_now
 * @property int $graduation
 */
class JobEducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobid', 'university', 'major', 'admission'], 'required'],
            [['jobid', 'admission', 'lern_now', 'graduation'], 'integer'],
            [['university', 'major'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jobid' => 'Jobid',
            'university' => 'University',
            'major' => 'Major',
            'admission' => 'Admission',
            'lern_now' => 'Lern Now',
            'graduation' => 'Graduation',
        ];
    }
}
