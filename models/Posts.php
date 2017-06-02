<?php

namespace app\models;

use yii\base\Model;
use app\components\Behaviory;

class Posts extends Model
{
    public $name = 'my name is ...';
    const MY_SOME_EVENT = 'personal event';
    
    public function behaviors(){	    //	навешиваем поведения
	
	return[
	    [
		'class' => Behaviory::className(),
	    ]
	];
    }
    
    public function MyFixEvent()
    {
	$this->trigger(self::MY_SOME_EVENT);
    }
}