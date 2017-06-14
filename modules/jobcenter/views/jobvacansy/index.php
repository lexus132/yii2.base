<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('JOBCENTERModule.jobvacansy', 'Careers');
?>
<style>
    table{
	text-align: center;
    }
</style>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Html::encode($this->title) ?></strong></div>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<div class="panel-body">
	    <div class="job-vacansy-index">

		<p>
		    <?= Html::a(Yii::t('JOBCENTERModule.jobvacansy', 'Create a vacancy'), ['create'], ['class' => 'btn btn-success']) ?>
		</p>
		<?= GridView::widget([
		    'dataProvider' => $dataProvider,
		    'filterModel' => $searchModel,
		    'tableOptions' => ['class' => 'table table-hover'],
		    'columns' => [
			['class' => 'yii\grid\SerialColumn'],

//			'id',
//			'user_id',
			'category_title',
			'city_title',
			'status',
			'vacansy_title',
//			'company_title',
//			[
//			    'attribute' => 'company_title',
//			    'format' => 'text',
//			    'value' => function($data,$category){
//				header('Content-Type: text/html; charset=utf-8');
//				echo '<pre>';
//				print_r($data);
//				exit;
//				return $data->category_id;
//				return $category;
//				$temp = (int)$data->category_id;
//				return $category[$temp];
//			    },
//			],
			// 'company_site',
			// 'company_description:ntext',
			// 'company_phone:ntext',
			// 'company_email:ntext',

			[
			    'class' => 'yii\grid\ActionColumn',
			    'options' => ['width' => '80px'],
			],
		    ],
		]); ?>
	    </div>
	</div>
    </div>
</div>