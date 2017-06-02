<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JobVacansy */

$this->title = 'Create Job Vacansy';
$this->params['breadcrumbs'][] = ['label' => 'Job Vacansies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-vacansy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
