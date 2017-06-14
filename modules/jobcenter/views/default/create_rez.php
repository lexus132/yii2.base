<?php
use yii\widgets\LinkPager;
?>
    <?= \app\modules\jobcenter\widgets\JobContent::widget([
	'vacancy' => $vacancy,
    ]);?>
    <?= LinkPager::widget(['pagination' => $page]);?>