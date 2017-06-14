<?php

namespace app\modules\jobcenter\widgets;

use humhub\components\Widget;
//use humhub\modules\content\components\ContentContainerActiveRecord;
use Yii;

class JobContent extends Widget
{
    /**
     * @var ContentContainerActiveRecord
     */
    public $vacancy;

    public function run()
    {
	
	$line = '';
	foreach ($this->vacancy as $value) {
	    
	    $vacansy_title = (!empty($value->vacansy_title))? $value->vacansy_title : '';
	    $line .= '<div class="panel panel-default wall_humhubmodulescalendarmodelsCalendarEntry_9">'.
	    '    <div class="panel-body">'.
	    '	<div class="media">'.
	    '	    <div class="media-body">'.
	    '	    <i style="float:right;">'.$value->city_title.'</i>'.
		'<a href="'. Yii::$app->urlManager->createUrl(['JOBCENTER/default/index', 'id' => $value->id]) .'">'.
				 $vacansy_title .
			    '</a>'.
	    '	    </div>'.
	    '	    <hr>'.
	    '	    <div class="content">'.\yii\helpers\StringHelper::truncate($value->company_description,450,'...').
	    '	    </div>'.
	    '	    <hr>'.
	    '	    '.date('Y-m-d', date_timestamp_get(date_create($value->created_at))).
//			$value->created_at.
	    '	</div>'.
	    '    </div>'.
	    '</div>';
	}
	return $line;
    }
}
