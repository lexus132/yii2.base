<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\jobcenter\models\SearchCities */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('JOBCENTERModule.jobcities_view_index', 'Cities');
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Html::encode($this->title) ?></strong></div>
	<div class="panel-body">
	    <div class="job-cities-index">


    <p>
        <?= Html::a(Yii::t('JOBCENTERModule.jobcities_view_index', 'Add city'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
	'tableOptions' => ['class' => 'table table-hover'],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'city',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	    </div>
	</div>
    </div>
</div>