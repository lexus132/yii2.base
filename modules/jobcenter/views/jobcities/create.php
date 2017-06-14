<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\jobcenter\models\JobCities */

$this->title = Yii::t('JOBCENTERModule.jobcities_view_create', 'Add city');
?>
    <div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Html::encode($this->title) ?></strong></div>
	<div class="panel-body">
	    <div class="job-category-index">

		<?= $this->render('_form', [
		    'model' => $model,
		]) ?>
	    </div>
	</div>
    </div>
</div>