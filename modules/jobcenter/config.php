<?php
return [
	'id' => 'JOBCENTER',
	'class' => 'humhub\modules\JOBCENTER\JobCenter',
	'namespace' => 'humhub\modules\JOBCENTER',
	'events' => [
		[
			'class' => \humhub\widgets\TopMenu::className(),
			'event' => \humhub\widgets\TopMenu::EVENT_INIT,
			'callback' => ['humhub\modules\JOBCENTER\Events', 'onTopMenuInit'],
		],
		[
			'class' => humhub\modules\admin\widgets\AdminMenu::className(),
			'event' => humhub\modules\admin\widgets\AdminMenu::EVENT_INIT,
			'callback' => ['humhub\modules\JOBCENTER\Events', 'onAdminMenuInit']
		],
	],
];
?>

