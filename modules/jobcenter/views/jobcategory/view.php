<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JobCategory */

$this->title = $model->category_item;
?>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Html::encode($this->title) ?></strong></div>
	<div class="panel-body">
	    <div class="job-category-view">

		<?= DetailView::widget([
		    'model' => $model,
		    'attributes' => [
			'id',
			'category_item',
		    ],
		]) ?>
		<br>
		<p>
		    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-warning',
			'data' => [
			    'confirm' => Yii::t('JOBCENTERModule.jobcities_view_view', 'Are you sure you want to delete the post?'),
			    'method' => 'post',
			],
		    ]) ?>
		</p>
	    </div>
	</div>
    </div>
</div>
