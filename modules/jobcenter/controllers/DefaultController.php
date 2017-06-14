<?php

//namespace humhub\modules\JOBCENTER\controllers;
namespace humhub\modules\JOBCENTER\controllers;

use \yii;
use app\modules\jobcenter\models\JobVacansy;
use app\modules\jobcenter\models\JobCategory;
use yii\data\Pagination;

class DefaultController extends \yii\web\Controller
{

    public $statusenable = true;
    
    public $itemcount = 15;

    public function actionIndex($id = null)
    {
	if(Yii::$app->user->isGuest)
	    return Yii::$app->getResponse()->redirect(Yii::$app->defaultRoute);
	
	$filter = $this->filter();
	
	if(!empty($filter['id'])){
	    if($this->statusenable) $status = 1;
	    $vacancy = JobVacansy::find()->where(['id' => $filter['id'], 'status' => $status])->one();
	    if(!empty($vacancy->vacansy_title)){
		return $this->render('item',[
		    'vacancy' => $vacancy,
		]);
	    } else {
		return Yii::$app->getResponse()->redirect(\Yii::$app->defaultRoute);
	    }
	} else {
	    $tempFilt = $filter;
	    
	    if(isset($tempFilt['search'])) unset($tempFilt['search']);
	    if(isset($tempFilt['page'])) unset($tempFilt['page']);
	    if($this->statusenable) $tempFilt['status'] = 1;
	    $vacancys = JobVacansy::find()->where($tempFilt);
		
	    if(empty($vacancys)){
		return \Yii::$app->getResponse()->redirect('/JOBCENTER/default/index');
	    }
	
	    $page = new Pagination([
		'defaultPageSize' => $this->itemcount,
		'params' => array_merge($_GET, $filter),
		'totalCount' => $vacancys->count(),
	    ]);
	    $vacancy = $vacancys->offset($page->offset)->limit($page->limit)->all();
	    }
	    return $this->render('index',[
		'vacancy' => $vacancy,
		'page' => $page,
	    ]);
    }
    
    public function actionAjaxdat()
    {
	$filter = $this->filter();
//	sleep(2);
	if(\Yii::$app->request->isAjax){
	    $rezult = array(
		'saccess' => '',
		'errors' => array(),
	    );
//	    if(\Yii::$app->request->isGet and (!empty($filter['category_id']))){
	    if(\Yii::$app->request->isGet){
	
		$tempFilt = $filter;
		if(isset($tempFilt['page'])) unset($tempFilt['page']);
		if($this->statusenable) $tempFilt['status'] = 1;
		$vacancys = JobVacansy::find()->where($tempFilt);
		
		if(!empty($vacancys) and ($vacancys->count() > 0)){
		    $page = new Pagination([
			    'defaultPageSize' => $this->itemcount,
			    'totalCount' => $vacancys->count(),
			]);
		    $vacancy = $vacancys->offset($page->offset)->limit($page->limit)->all();
		    $rezult['saccess']['view'] = $this->render('create_rez',[
			'vacancy' => $vacancy,
			'page' => $page,
		    ]);
		} else {
		    $rezult['errors'][] = Yii::t('JOBCENTERModule.jobvacansy', 'There are no vacancies at these parameters.');
		}
		
	    } else {
		$rezult['errors'][] = 'Some errow!';
	    }
	    header('Content-Type: application/json');
	    return json_encode($rezult);
	    exit;
	} else {
	    $tempI = 1;
	    $url = '';
	    foreach ($filter as $key => $value){
		if($tempI === 1){
		    $url .= '?';
		}else{
		    $url .= '&';
		}
		$tempI ++;
		$url .= $key.'='.$value;
	    }
	    return Yii::$app->getResponse()->redirect('/JOBCENTER/default/index'.$url);
	}
    }
    
    public function actionSearch()
    {
	if(Yii::$app->user->isGuest)
	    return Yii::$app->getResponse()->redirect(Yii::$app->defaultRoute);
	
	$filter = $this->filter();
	$search = '';
	
	if(!empty($filter['search'])){
	    
	    $search = $filter['search'];
	    if(isset($filter['search'])) unset($filter['search']);
	    if(isset($filter['page'])) unset($filter['page']);
	    if(isset($filter['id'])) unset($filter['id']);
	    if($this->statusenable) $filter['status'] = 1;
	    
//	    $vacancy = JobVacansy::find()->where(['id' => $filter['id'], 'status' => $status])->one();
//	    if(!empty($filter['category_id']) or !empty($filter['city_id'])){
//	    $vacancys = JobVacansy::find()->where($filter)->andWhere(
//			[
//			    'OR',[
//				['like', 'city_title', '%'.$search.'%', false]
//			    ]
//			]
//		    );
	    $vacancys = JobVacansy::find()->where($filter)->andWhere([
		    'OR',
			['like', 'category_title', '%'.$search.'%', false],
			['like', 'vacansy_title', '%'.$search.'%', false],
			['like', 'company_title', '%'.$search.'%', false],
			['like', 'company_site', '%'.$search.'%', false],
			['like', 'company_description', '%'.$search.'%', false],
			['like', 'company_phone', '%'.$search.'%', false],
			['like', 'company_email', '%'.$search.'%', false],
			['like', 'city_title', '%'.$search.'%', false]
		    ]);
//			header('Content-Type: text/html; charset=utf-8');
//			echo '<pre>';
//			print_r($vacancys);
//			exit;
//		    ->orWhere(['like', 'city_title', '%'.$search.'%', false])
//			['AND', ['like', 'company_email', '%'.$search.'%', false]
//			    ['like', 'company_email', '%'.$search.'%', false],
//			    ['OR',['like', 'city_title', '%'.$search.'%', false]],
//			    ['OR',['like', 'category_title', '%'.$search.'%', false]],
//			    ['OR',['like', 'vacansy_title', '%'.$search.'%', false]],
//			    ['OR',['like', 'company_title', '%'.$search.'%', false]],
//			    ['OR',['like', 'company_description', '%'.$search.'%', false]],
//			    ['OR',['like', 'company_phone', '%'.$search.'%', false]]
//			]]
	    
	    
//	    $vacancys = (new \yii\db\Query())
//		->select(['*'])
//		->from('job_vacansy')
//		->where($filter, 
//			['AND',[
//			    ['like', 'company_email', '%'.$search.'%', false],
//			    ['OR',['like', 'city_title', '%'.$search.'%', false]],
//			    ['OR',['like', 'category_title', '%'.$search.'%', false]],
//			    ['OR',['like', 'vacansy_title', '%'.$search.'%', false]],
//			    ['OR',['like', 'company_title', '%'.$search.'%', false]],
//			    ['OR',['like', 'company_description', '%'.$search.'%', false]],
//			    ['OR',['like', 'company_phone', '%'.$search.'%', false]]
//			]]
//			);
//		->limit(2)
//		    ->andWhere(['like', 'category_title', '%'.$search.'%', false])
//		    ->orWhere(['like', 'city_title', '%'.$search.'%', false])
//		    ->orWhere(['like', 'vacansy_title', '%'.$search.'%', false])
//		    ->orWhere(['like', 'company_title', '%'.$search.'%', false])
//		    ->orWhere(['like', 'company_description', '%'.$search.'%', false])
//		    ->orWhere(['like', 'company_phone', '%'.$search.'%', false])
//		    ->orWhere(['like', 'company_email', '%'.$search.'%', false]);
	    
//	    header('Content-Type: text/html; charset=utf-8');
//	    echo '<pre>';
//	    print_r($filter);
//	    echo '<hr>';
//	    print_r($search);
//	    foreach ($vacancys as $value) {
//		print_r($value);
//	    }
//	    exit;
	    
		    
//		    return $this->render('search',[
//			'vacancy' => $vacancy,
//			'page' => $page,
//		    ]);
	    $page = new Pagination([
		'defaultPageSize' => $this->itemcount,
		'params' => array_merge($_GET, $this->filter()),
		'totalCount' => $vacancys->count(),
	    ]);
	    $vacancy = $vacancys->offset($page->offset)->limit($page->limit)->all();
	    
//	    header('Content-Type: text/html; charset=utf-8');
//	    echo '<pre>';
//	    print_r($vacancy);
//	    exit;
	    
	    return $this->render('search',[
		'vacancy' => $vacancy,
		'page' => $page,
		'search' => $search,
	    ]);
	} else {
	    return \Yii::$app->getResponse()->redirect('/JOBCENTER/default/index');
	}
    }
    
    private function filter()
    {
	$filter = array();
	
	if(!empty(\Yii::$app->request->get('category_id')))
	    $filter['category_id'] = (int)\Yii::$app->request->get('category_id');
	
	if(!empty(\Yii::$app->request->get('city_id')))
	    $filter['city_id'] = (int)\Yii::$app->request->get('city_id');
	
	if(!empty(\Yii::$app->request->get('page')))
	    $filter['page'] = (int)\Yii::$app->request->get('page');
	
	if(!empty(\Yii::$app->request->get('id')))
	    $filter['id'] = (int)\Yii::$app->request->get('id');
	
	if(!empty(\Yii::$app->request->get('search')))
	    $filter['search'] = \Yii::$app->request->get('search');
	
	
	return $filter;
    }
	
}

