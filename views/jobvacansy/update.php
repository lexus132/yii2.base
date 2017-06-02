<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JobVacansy */

$this->title = 'Update Job Vacansy: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Job Vacansies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-vacansy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
