<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Viseo`s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>Please fill out the following fields to login:</p>-->
    <h3>Поведения[Behaviors]</h3>
	<div class="video">
	    <video class="col-xs-8" autoplay loop controls tabindex="0" muted>
		<source src="/video/Yii2.0 -  Поведения[Behaviors].mp4" type="video/mp4">
		<!--<source src="http://d-amore.ru/catalog/view/theme/damore/video/video.mp4" type="video/mp4">-->
		<!--<source src="http://d-amore.ru/catalog/view/theme/damore/video/video.ogv" type="video/ogg">-->
		<!--<source src="http://d-amore.ru/catalog/view/theme/damore/video/video.webm" type="video/webm">-->
	    </video>
	</div>
</div>