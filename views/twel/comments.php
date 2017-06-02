<?php
use yii\helpers\Url;
$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="body-content">
	    
	<!--<div class="table-responsive">-->
	    <!--<table class="table table-striped">-->
	<table style="text-align: center;" class="table  table-bordered">
	    <?php if(!empty($data['comments'])){ ?>
		<!--<thead class="thead-inverse">-->
		    <tr  style="text-align: center; font-weight: bolder;">
			<td>#</td>
			<td><?= $data['comments'][0]->attributeLabels()['name']; ?></td>
			<td><?= $data['comments'][0]->attributeLabels()['text']; ?></td>
		    </tr>
		<!--</thead>-->
		<!--<tbody>-->
		    <?php foreach($data['comments'] as $coment){ ?>
			<tr>
			    <td><?= (!empty($coment->id))? $coment->id : ''; ?></td>
			    <td><?= (!empty($coment->name))? ucfirst($coment->name) : ''; ?></td>
			    <td><?= (!empty($coment->text))? $coment->text : ''; ?></td>
			</tr>
		    <?php } ?>
		<!--</tbody>-->
	    <?php } ?>
	    </table>
	<!--</div>-->
<!--        <div class="row">
            <div class="col-lg-12">
		<pre>
		    <?php print_r((!empty($data['comments']))? $data['comments'] : ''); ?>
		</pre>
            </div>
	</div>-->
<!--        <div class="row">
            <div class="col-lg-4">
		<p><?php echo (!empty($message))? $message : ''; ?></p>
            </div>
        </div>
        <div class="row">
	    <form action="<?php echo Url::to(['/twel/index']); ?>" method="POST">
		<input name="test">
		<input type="submit">
	    </form>
	    
	</div>
	
        <div class="row">
	    <p><b>url</b>  <?php print(Yii::$app->request->url);?></p>	    
	    <p><b>absoluteUrl</b>  <?php print(Yii::$app->request->absoluteUrl);?></p>	    
	</div>
	-->
    </div>
</div>
