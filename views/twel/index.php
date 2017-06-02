<?php
$this->registerJsFile(
	    '@web/js/axemple.js',	// dir - /web/js/axemple.js
	    ['depends' => [\yii\web\JqueryAsset::className()]]
	);
use yii\helpers\Url;
$this->title = 'Twel lessons';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
		<p>Hello world</p>
            </div>
	</div>
        <div class="row">
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
	
    </div>
</div>
