<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\jobcenter\models\JobCities */

$this->title = Yii::t('JOBCENTERModule.jobcities_view_update', 'Update: ') . $model->city;
//$this->title = 'Update: ' . $model->city;
//$this->params['breadcrumbs'][] = ['label' => 'Job Cities', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Html::encode($this->title) ?></strong></div>
	<div class="panel-body">
	    <div class="job-cities-update">

		<?= $this->render('_form', [
		    'model' => $model,
		]) ?>

	    </div>
	</div>
    </div>
</div>