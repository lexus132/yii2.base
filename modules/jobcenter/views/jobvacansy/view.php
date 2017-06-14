<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\jobcenter\models\JobVacansy */

$this->title = $model->vacansy_title;
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Html::encode($this->title) ?></strong></div>
	<div class="panel-body">
	    <div class="job-vacansy-view">

		<p>
		    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
			    'confirm' => Yii::t('JOBCENTERModule.jobvacansy', 'Are you sure you want to delete this item?'),
			    'method' => 'post',
			],
		    ]) ?>
		</p>
		<?= DetailView::widget([
		    'model' => $model,
		    'attributes' => [
//			'id',
//			'category_id',
			'category_title',
//			'city_id',
			'city_title',
			'status',
			'vacansy_title',
			'company_title',
			'company_site',
			'company_phone:ntext',
			'company_email:ntext',
			'company_description:html',
			'created_at',
			'updated_at',
		    ],
		]) ?>
		<?php /* DetailView::widget([
		    'model' => $model,
		    'attributes' => [
//			'id',
//			'user_id',
//			'category_id',
			[
			    'label' => 'Categidy',
			    'value' => $model->category_id,
			],
//			'status',
			[
			    'label' => $model->attributeLabels()['status'],
			    'format' => 'raw',
//			    'value' => \yii\bootstrap\Html::tag('input','',['type' => 'checkbox', 'value' => $model->status]),
			    'value' => '<input type="checkbox" disabled="disabled" '.$tempLine.'>',
			],
//			'status',
			'company_title',
			'company_site',
			'company_description:html',
			'company_phone:ntext',
			'company_email:ntext',
		    ],
		]) */ ?>
		
	    </div>
	</div>
    </div>
</div>