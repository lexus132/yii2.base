<?php

namespace app\modules\jobcenter\models;

use Yii;

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
	    [['user_id', 'category_id', 'category_title', 'city_id', 'city_title', 'vacansy_title', 'company_description', 'company_phone', 'company_email', 'created_at'], 'required'],
            [['user_id', 'category_id', 'city_id', 'status'], 'integer'],
            ['company_email', 'email'],
            ['status', 'default', 'value' => 1],
            [['company_description'], 'string'],
            [['company_title', 'company_site', 'vacansy_title', 'company_phone', 'category_title', 'city_title'], 'string', 'max' => 255],
	    [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	 return [
            'id' => Yii::t('JOBCENTERModule.jobvacansy', 'ID'),
            'user_id' => Yii::t('JOBCENTERModule.jobvacansy', 'User ID'),
            'category_id' => Yii::t('JOBCENTERModule.jobvacansy', 'Category ID'),
            'category_title' => Yii::t('JOBCENTERModule.jobvacansy', 'Category Title'),
            'city_id' => Yii::t('JOBCENTERModule.jobvacansy', 'City ID'),
            'city_title' => Yii::t('JOBCENTERModule.jobvacansy', 'City Title'),
            'status' => Yii::t('JOBCENTERModule.jobvacansy', 'Status'),
            'vacansy_title' => Yii::t('JOBCENTERModule.jobvacansy', 'Vacansy Title'),
            'company_title' => Yii::t('JOBCENTERModule.jobvacansy', 'Company Title'),
            'company_site' => Yii::t('JOBCENTERModule.jobvacansy', 'Company Site'),
            'company_description' => Yii::t('JOBCENTERModule.jobvacansy', 'Company Description'),
            'company_phone' => Yii::t('JOBCENTERModule.jobvacansy', 'Contact phone'),
            'company_email' => Yii::t('JOBCENTERModule.jobvacansy', 'Contact Email'),
            'created_at' => Yii::t('JOBCENTERModule.jobvacansy', 'Created At'),
            'updated_at' => Yii::t('JOBCENTERModule.jobvacansy', 'Updated At'),
        ];
    }
}
