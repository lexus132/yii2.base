<?php

namespace humhub\modules\JOBCENTER;

use Yii;
use yii\helpers\Url;

class Events extends \yii\base\Object
{

    /**
     * Defines what to do when the top menu is initialized.
     *
     * @param $event
     */
    public static function onTopMenuInit($event)
    {
        $event->sender->addItem(array(
            'label' => "JOBS",
//            'icon' => '<i class="fa fa-certificate" style="color: #6fdbe8;"></i>',
            'url' => Url::to(['/JOBCENTER/default']),
            'sortOrder' => 4,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'JOBCENTER' && Yii::$app->controller->id == 'default'),
        ));
    }


    /**
     * Defines what to do if admin menu is initialized.
     *
     * @param $event
     */
    public static function onAdminMenuInit($event)
    {
//        $event->sender->addItem(array(
//            'label' => "JOB CENTER",
//            'url' => Url::to(['/JOBCENTER/admin']),
//            'group' => 'manage',
//            'icon' => '<i class="fa fa-certificate" style="color: #6fdbe8;"></i>',
//            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'JOBCENTER' && Yii::$app->controller->id == 'admin'),
//            'sortOrder' => 99999,
//        ));
//	$event->sender->addItemGroup(array(
//            'id' => 'manage',
////            'label' => \Yii::t('AdminModule.widgets_AdminMenuWidget', '<strong>Administration</strong> menu'),
//	    'label' => "JOB CENTER",
//            'sortOrder' => 100,
//        ));

        $event->sender->addItem(array(
            'label' => "JOB CENTER",
            'url' => Url::to(['/JOBCENTER/']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-certificate" style="color: #6fdbe8;"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'JOBCENTER' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ));
        $event->sender->addItem(array(
            'label' => "Vacansy",
            'url' => Url::to(['/JOBCENTER/jobvacansy']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-sign-in"></i>',
//            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'JOBCENTER' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ));
        $event->sender->addItem(array(
            'label' => "Category",
            'url' => Url::to(['/JOBCENTER/jobcategory']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-sign-in"></i>',
//            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'JOBCENTER' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ));
        $event->sender->addItem(array(
            'label' => "Cities",
            'url' => Url::to(['/JOBCENTER/jobcities']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-sign-in"></i>',
//            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'JOBCENTER' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ));
    }

}
