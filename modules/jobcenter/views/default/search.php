<?php

use yii\widgets\LinkPager;
use yii\bootstrap\Html;
use yii\widgets\ActiveField;

?>

<div class="container">
    <div class="row">
        <div id="main_content" class="col-md-8 layout-content-container">
	    <?= \app\modules\jobcenter\widgets\JobContent::widget([
		'vacancy' => $vacancy,
	    ]);?>
	    <?= LinkPager::widget(['pagination' => $page]);?>
	    
        </div>
        <div class="col-md-4 layout-sidebar-container">
	    <div class="row">
		    <?= app\modules\jobcenter\widgets\JobcenterMenu::widget([
			'search' => $search,
		    ]); ?>
	    </div>
	    <div class="row">
		<?php
		echo \humhub\modules\dashboard\widgets\Sidebar::widget([
		    'widgets' => [
			[
			    \humhub\modules\activity\widgets\Stream::className(),
			    ['streamAction' => '/dashboard/dashboard/stream'],
			    ['sortOrder' => 150]
			]
		    ]
		]);
		?>
	    
	    </div>
        </div>
    </div>
</div>
