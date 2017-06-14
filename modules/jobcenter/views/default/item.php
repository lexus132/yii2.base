<?php
?>
<div class="container">
    <div class="row">
        <div id="main_content" class="col-md-8 layout-content-container">
	    <div class="panel panel-default wall_humhubmodulescalendarmodelsCalendarEntry_9">
		<div class="panel-heading">
		    <strong>
			<?= $vacancy->vacansy_title; ?>
		    </strong>
		</div>
		<div class="panel-body">
		    <!--<div class="media">-->
			<!--<hr>-->
			<div class="row">
			    <div class="col-xs-4">
				<?= Yii::t('JOBCENTERModule.jobvacansy', 'City : '); ?>
				<?= $vacancy->city_title; ?>
			    </div>
			    <div class="col-xs-4">
				<?php if(!empty($vacancy->company_title)): ?>
				    <?= Yii::t('JOBCENTERModule.jobvacansy', 'Company : '); ?>
				    <?= $vacancy->company_title; ?>
				<?php endif; ?>
			    </div>
			    <div class="col-xs-4">
				<?php if(!empty($vacancy->company_email)): ?>
				    <?= Yii::t('JOBCENTERModule.jobvacansy', 'Company site : '); ?>
				    <?= $vacancy->company_email; ?>
				<?php endif; ?>
			    </div>
			</div>
			<hr>
			<div class="content"><?= $vacancy->company_description; ?>
			</div>
			<hr>
			<div class="row">
			    <div class="col-xs-5">
				<?php if(!empty($vacancy->company_phone)): ?>
				    <?= Yii::t('JOBCENTERModule.jobvacansy', 'Contact phone'); ?>
				    <?= ' : '; ?>
				    <?= $vacancy->company_phone; ?>
				<?php endif; ?>
			    </div>
			    <div class="col-xs-5">
				<?php if(!empty($vacancy->company_email)): ?>
				    <?= Yii::t('JOBCENTERModule.jobvacansy', 'Contact Email'); ?>
				    <?= ' : '; ?>
				    <?= $vacancy->company_email; ?>
				<?php endif; ?>
			    </div>
			    <div class="col-xs-2" style="text-align: right;">
				<?= date('Y-m-d', date_timestamp_get(date_create($vacancy->created_at))); ?>
			    </div>
			</div>
		    <!--</div>-->
		</div>
	    </div>
        </div>
        <div class="col-md-4 layout-sidebar-container">
	    <div class="row">
		<?= app\modules\jobcenter\widgets\JobcenterMenu::widget(); ?>
	    </div>
	    <div class="row">
		<?php
		echo \humhub\modules\dashboard\widgets\Sidebar::widget([
		    'widgets' => [
			[
			    \humhub\modules\activity\widgets\Stream::className(),
			    ['streamAction' => '/dashboard/dashboard/stream'],
			    ['sortOrder' => 150]
			]
		    ]
		]);
		?>
	    </div>
        </div>
    </div>
</div>
