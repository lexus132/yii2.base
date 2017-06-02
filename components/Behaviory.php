<?php

namespace app\components;

use yii\base\Behavior;

class Behaviory extends Behavior
{
    public $param1 = 1;
    public $param2 = 'som line';
    
    public function foo(){
//	return 'second some line';
	return $this->owner;		// $this->owner -хранит объект того класса, к которому поведение навешено
    }
    
    public function events(){
	return [
	    Post::MY_SOME_EVENT => 'thenDo',
	];
    }
    
    public function thenDo()
    {
	return 'in Post work MY_SOME_EVENT';
    }
    
}