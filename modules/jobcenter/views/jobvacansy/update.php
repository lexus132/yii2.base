<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\jobcenter\models\JobVacansy */
$this->title = Yii::t('JOBCENTERModule.jobvacansy', 'Update : ') . $model->vacansy_title;
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Html::encode($this->title) ?></strong></div>
	<div class="panel-body">
	    <div class="job-vacansy-update">

		<!--<h1><?= Html::encode($this->title) ?></h1>-->

		<?= $this->render('_form', [
		    'model' => $model,
		    'category' => $category,
		    'city' => $city,
		]) ?>

	    </div>
	</div>
    </div>
</div>