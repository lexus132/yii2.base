<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('JOBCENTERModule.jobcategory_view_index', 'Categories');
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Html::encode($this->title) ?></strong></div>
	<div class="panel-body">
	    <div class="job-category-index">
		<p>
		    <?= Html::a(Yii::t('JOBCENTERModule.jobcategory_view_index', 'Add category'), ['create'], ['class' => 'btn btn-success']) ?>
		</p>
		<?= GridView::widget([
		    'dataProvider' => $dataProvider,
		    'filterModel' => $searchModel,
		    'tableOptions' => ['class' => 'table table-hover'],
		    'columns' => [
			['class' => 'yii\grid\SerialColumn'],

	    //            'id',
			'category_item',

			['class' => 'yii\grid\ActionColumn'],
		    ],
		]); ?>
	    </div>
	</div>
    </div>
</div>