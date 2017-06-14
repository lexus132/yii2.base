<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\jobcenter\models\JobVacansy */

$this->title = Yii::t('JOBCENTERModule.jobvacansy', 'Create a vacancy');
//$this->params['breadcrumbs'][] = ['label' => 'Job Vacansies', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Html::encode($this->title) ?></strong></div>
	<div class="panel-body">
	    <div class="job-vacansy-index">
		<div class="job-vacansy-create">

		    <?= $this->render('_form', [
			'model' => $model,
			'category' => $category,
			'city' => $city,
		    ]) ?>

		</div>
	    </div>
	</div>
    </div>
</div>