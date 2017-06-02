<?php

namespace app\models\job;

use Yii;

/**
 * This is the model class for table "job_category".
 *
 * @property int $id
 * @property string $category_item
 */
class JobCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_item'], 'required'],
            [['category_item'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_item' => 'Category Item',
        ];
    }
}
