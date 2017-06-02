<?php

namespace app\models;

use yii\base\Model;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 */
class Events extends Model
{

    const SOME_DEFAULT_EVENT = 'at this time event is and';
    
    public function init() {
	
    }
    
    public function methodFromObject() {
	print_r('<br>at this time event is and');
    }
}
