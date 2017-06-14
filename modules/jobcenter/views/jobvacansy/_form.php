<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\jobcenter\models\JobVacansy */
/* @var $form yii\widgets\ActiveForm */

$script = <<<JS
    $('#jobvacansy-category_id').on('change', function(e){
	var str = "";
	var cat = parseInt($(this).val(),10);
	$( "#jobvacansy-category_id option:selected" ).each(function() {
	    str = $( this ).text();
	});
	if(cat > 0){
	    $('#jobvacansy-category_title').val(str);
	}
    });
    $('#jobvacansy-city_id').on('change', function(e){
	var str = "";
	var cit = parseInt($(this).val(),10);
	$( "#jobvacansy-city_id option:selected" ).each(function() {
	    str = $( this ).text();
	});
	if(cit > 0){
	    $('#jobvacansy-city_title').val(str);
	}
    });
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
JS;

$this->registerJs(
    $script
);
$this->registerJsFile(
    '@web/js/nicEdit.js',														// dir - /web/js/axemple.js (url)
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$tempCat = '';
if(empty($model->category_title)){
    $tempCat = $category;
    $tempCat = array_shift($tempCat);
} else {
    $tempCat = $model->category_title;
}
$tempCit = '';
if(empty($model->city_title)){
    $tempCit = $city;
    $tempCit = array_shift($tempCit);
} else {
    $tempCit = $model->city_title;
}

?>
<div class="job-vacansy-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <?php //= $form->field($model, 'user_id')->textInput()->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'category_id')->dropDownList($category)->label($model->attributeLabels()['category_title']); ?>
    
    <?= $form->field($model, 'category_title')->hiddenInput(['value' => $tempCat])->label(false); ?>
    
    <?= $form->field($model, 'city_id')->dropDownList($city)->label($model->attributeLabels()['city_title']); ?>
    
    <?= $form->field($model, 'city_title')->hiddenInput(['value' => $tempCit])->label(false); ?>
    
    <?= $form->field($model, 'status')->checkbox() ?>
    
    <?= $form->field($model, 'vacansy_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_description')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'company_phone')->textInput() ?>

    <?= $form->field($model, 'company_email')->textInput() ?>

    <?php //= $form->field($model, 'created_at')->textInput()->hiddenInput()->label(false); ?>

    <?php //= $form->field($model, 'updated_at')->textInput()->hiddenInput()->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-info' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>