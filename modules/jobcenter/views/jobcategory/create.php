<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\jobcenter\models\JobCategory */

$this->title = Yii::t('JOBCENTERModule.jobcategory_view_create', 'Add category');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Job Categories'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Html::encode($this->title) ?></strong></div>
	<div class="panel-body">
	    <div class="job-category-create">

		<?= $this->render('_form', [
		    'model' => $model,
		]) ?>

	    </div>
	</div>
    </div>
</div>