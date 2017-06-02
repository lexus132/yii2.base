<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = 'urli';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="body-content">
	    
	<table style="text-align: center;" class="table  table-bordered">
	    <?php if(!empty($coments)){ ?>
		    <tr  style="text-align: center; font-weight: bolder;">
			<td>#</td>
			<td><?= $coments[0]->attributeLabels()['name']; ?></td>
			<td><?= $coments[0]->attributeLabels()['type']; ?></td>
			<td><?= $coments[0]->attributeLabels()['description']; ?></td>
		    </tr>
		    <?php foreach($coments as $coment){ ?>
			<tr>
			    <td><?= (!empty($coment->id))? $coment->id : ''; ?></td>
			    <td>
				<a href="<?= Yii::$app->urlManager->createUrl(['twel/url', 'id' => $coment->id]); ?>">
				    <?= (!empty($coment->name))? ucfirst($coment->name) : ''; ?>
				</a>
			    </td>
			    <td><?= (!empty($coment->type))? $coment->type : ''; ?></td>
			    <td><?= (!empty($coment->description))? $coment->description : ''; ?></td>
			</tr>
		    <?php } ?>
	    <?php } ?>
	    </table>
	<?= LinkPager::widget(['pagination' => $page]);?>
    </div>
</div>
