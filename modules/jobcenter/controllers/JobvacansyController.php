<?php

namespace humhub\modules\JOBCENTER\controllers;

use Yii;
use app\modules\jobcenter\models\JobVacansy;
use app\modules\jobcenter\models\SearchVacancy;
use app\modules\jobcenter\models\JobCategory;
use app\modules\jobcenter\models\JobCities;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JobvacansyController implements the CRUD actions for JobVacansy model.
 */
class JobvacansyController extends \humhub\modules\JOBCENTER\controllers\AdminController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
	    'acl' => [
                'class' => \humhub\components\behaviors\AccessControl::className(),
                'adminOnly' => true
            ]
        ];
    }

    /**
     * Lists all JobVacansy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchVacancy();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JobVacansy model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
	$model = $this->findModel($id);
	return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new JobVacansy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JobVacansy();
	
	$model->user_id = Yii::$app->user->id;
	$model->created_at = date('Y-m-d H-i-s', time());
	$model->status = 1;
	$category = JobCategory::find()->asArray()->all();
	$tempCat = array();
	foreach ($category as $value) {
	    $tempCat[$value['id']] = $value['category_item'];
	}
	$cities = JobCities::find()->asArray()->all();
	$tempCit = array();
	foreach ($cities as $value) {
	    $tempCit[$value['id']] = $value['city'];
	}

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
		'category' => $tempCat,
		'city' => $tempCit,
            ]);
        }
    }

    /**
     * Updates an existing JobVacansy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
	
        $model = $this->findModel($id);
	$model->updated_at = date('Y-m-d H-i-s', time());
	
	$category = JobCategory::find()->asArray()->all();
	$tempCat = array();
	foreach ($category as $value) {
	    $tempCat[$value['id']] = $value['category_item'];
	}
	$cities = JobCities::find()->asArray()->all();
	$tempCit = array();
	foreach ($cities as $value) {
	    $tempCit[$value['id']] = $value['city'];
	}

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
		'category' => $tempCat,
		'city' => $tempCit,
            ]);
        }
    }

    /**
     * Deletes an existing JobVacansy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JobVacansy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JobVacansy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JobVacansy::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
