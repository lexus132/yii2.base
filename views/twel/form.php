<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\widgets\ActiveForm;

$this->title = 'Form';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <div class="body-content">
	<?php if(!empty(\Yii::$app->request->post())){ ?>
	    <h3>I have take <b>name:</b> <i>"<?= (!empty($data['name']))? ucfirst($data['name']) : 'guest'; ?>" </i> and <b>email:</b><i> "<?= (!empty($data['email']))? $email : 'no email'; ?>" </i></h3>
	    <?php if(!empty($data['message'])){ ?>
		<h3><b>File: </b> <?= $data['message']; ?></h3>
	    <?php } ?>
	<?php } ?>
		<!--<pre><b>Dir: </b> <?php // print_r($data); ?></pre>-->
	    <!--<h3><b>Data: </b> <?= (!empty($data['dir']))? $data['dir'] : ''; ?></h3>-->
        <div class="row">
	    <div class="col-ms-4">
		<?php $form = ActiveForm::begin(['options' => ['layout' => 'horizontal', 'enctype' => 'multipart/form-data']]); ?>

		    <?= $form->field($twel, 'name', [
			    'inputOptions' => [
				'placeholder' => $twel->getAttributeLabel('name'),
			    ],
			])->label(false); ?>
		    <?= $form->field($twel, 'email')->widget(\yii\redactor\widgets\Redactor::className()) ?>
		    <?= $form->field($twel, 'email', [
			    'inputOptions' => [
				'placeholder' => $twel->getAttributeLabel('email'),
			    ],
			])->label(false); ?>
		    <?= $form->field($twel, 'file', [
			    'inputOptions' => [
				'placeholder' => $twel->getAttributeLabel('file'),
			    ],
			])->label(false)->fileInput(); ?>
		<div class="col-sm-6 col-sm-offset-3">
		    <?= Html::submitButton('Let go!', ['class' => 'col-xs-12']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	    </div>
	</div>
<!--        <div class="row">
	    <div class="col-ms-4">
		<?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($twel, 'name') ?>
		    <?= $form->field($twel, 'email') ?>
		    <?= Html::submitButton('Go') ?>

		<?php ActiveForm::end(); ?>
	    </div>
	</div>-->
	
    </div>
</div>
