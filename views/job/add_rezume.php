<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Add rezume';
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model app\models\job\JobUser */
/* @var $form ActiveForm */
?>
<div class="add_rezume">

    <?php $form = ActiveForm::begin([
			    'options' => [
				'layout' => 'horizontal', 
//				'enctype' => 'multipart/form-data'
				]
		    ]); ?>
    <div class="row">
        <?= $form->field($educationm, 'university'); ?>
    </div>
    <div class="row">
        <?= $form->field($educationm, 'major'); ?>
    </div>
    <div class="row">
	<div class="col-xs-3">
	    <?= $form->field($educationm, 'admission')->label('Date admission'); ?>
	</div>
	<div class="col-xs-3">
	    <?= $form->field($educationm, 'graduation')->label('Date graduation'); ?>
	</div>
	<div class="col-xs-3">
	    <?= $form->field($educationm, 'lern_now')->checkbox()->label($educationm->getAttributeLabel('lern_now')); ?>
	</div>
    </div>
    <div class="row">
        <?= $form->field($userm, 'about')->textarea(['rows' => '3', 'placeholder' => 'For example: I am an outgoing and energetic (ask anybody) young professional, seeking a career that fits my professional skills, personality ...']) ?>
    </div>
    <div class="row">
        <?= $form->field($userm, 'hobbies')->textarea(['rows' => '3', 'placeholder' => 'For example: World Domination, Deep Sea Diving, ... ']) ?>
    </div>
    <div class="row">
        <?= $form->field($userm, 'references')->textarea(['rows' => '3', 'placeholder' => 'For example: Available on request']) ?>
    </div>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- add_rezume -->