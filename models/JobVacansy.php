<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job_vacansy".
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property int $status
 * @property string $company_title
 * @property string $company_site
 * @property string $company_description
 * @property string $company_phone
 * @property string $company_email
 */
class JobVacansy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_vacansy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'company_title', 'company_description', 'company_phone', 'company_email'], 'required'],
            [['user_id', 'category_id', 'status'], 'integer'],
            [['company_description', 'company_phone', 'company_email'], 'string'],
            [['company_title', 'company_site'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'status' => 'Status',
            'company_title' => 'Company Title',
            'company_site' => 'Company Site',
            'company_description' => 'Company Description',
            'company_phone' => 'Company Phone',
            'company_email' => 'Company Email',
        ];
    }
}
