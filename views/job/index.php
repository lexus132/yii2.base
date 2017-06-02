<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Job User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jobid',
            'user_id',
            'about:ntext',
            'hobbies:ntext',
            'references:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>