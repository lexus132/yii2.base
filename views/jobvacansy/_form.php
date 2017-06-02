<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobVacansy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-vacansy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'company_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'company_phone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'company_email')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
