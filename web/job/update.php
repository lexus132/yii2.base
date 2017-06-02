<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\job\JobUser */

$this->title = 'Update Job User: ' . $model->jobid;
$this->params['breadcrumbs'][] = ['label' => 'Job Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jobid, 'url' => ['view', 'id' => $model->jobid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
