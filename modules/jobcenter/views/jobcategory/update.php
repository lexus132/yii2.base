<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JobCategory */

//$this->title = 'Update Category: ' . $model->category_item;
$this->title = Yii::t('JOBCENTERModule.jobcategory_view_update', 'Update : ') . $model->category_item;
//$this->params['breadcrumbs'][] = ['label' => 'Job Categories', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Html::encode($this->title) ?></strong></div>
	<div class="panel-body">
	    <div class="job-category-update">

		<!--<h1><?= Html::encode($this->title) ?></h1>-->

		<?= $this->render('_form', [
		    'model' => $model,
		]) ?>

	    </div>
	</div>
    </div>