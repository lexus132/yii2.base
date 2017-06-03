<?php
use yii\bootstrap\Html;
$this->title = $coment->name;
$this->params['breadcrumbs'][] = ['label' => 'url', 'url' => ['twel/url']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <h1><?= (!empty($coment->name))? $coment->name : 'Some error'; ?></h1>
    <div class="body-content">
	<p><?= (!empty($coment->text))? $coment->text : 'Some error'; ?></p>
    </div>
<!--    <div class="body-content">
	<p><?php // = (!empty($coment->data))? $coment->data : 'Some error'; ?></p>
    </div>-->
    <?php //= Html::tag('p', $coment->created_at, ['style' => 'text-align:right;']); ?>
</div>
