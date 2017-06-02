<?php

namespace app\controllers;

use \yii\web\Controller;
use app\models\job\JobUser;
use app\models\job\JobEducation;

class JobrezumeController extends Controller
{
    public function actionIndex()
    {
	
	$educationm = new JobEducation();
	$userm = new JobUser();
        return $this->render('/job/add_rezume', ['userm' => $userm, 'educationm' => $educationm]);
    }

}
