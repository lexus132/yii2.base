<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\job\JobUser */

$this->title = $model->jobid;
$this->params['breadcrumbs'][] = ['label' => 'Job Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->jobid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->jobid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'jobid',
            'user_id',
            'about:ntext',
            'hobbies:ntext',
            'references:ntext',
        ],
    ]) ?>

</div>
