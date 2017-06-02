<?php

namespace app\controllers;

use Yii;
//use yii\filters\AccessControl;
use yii\web\Controller;
//use yii\web\Response;
//use yii\filters\VerbFilter;
//use app\models\Events;
use app\models\Twel;
use yii\bootstrap\Html;
use yii\web\UploadedFile;
use app\models\Coments;
use \app\models\News;
use yii\data\Pagination;
//use app\models\Posts;
//use app\models\LoginForm;
//use app\models\ContactForm;

class TwelController extends Controller
{
//    public $layout = 'not_main';
//    public $defaultAction = 'form';
//    public static $file;
    
    public function actionIndex($message = null)
    {
	$message = (!empty($message))? $message : 'No data';
	if(Yii::$app->request->post('name')){
	    $message = $this->request->post('name');
	}
//	$this->layout = 'not_main';
	
        return $this->render('index', array('message' => $message));
    }
    
    public function actionForm()
    {
	$twelForm = new Twel();
	$data = array();
	
	if($twelForm->load(Yii::$app->request->post()) and $twelForm->validate()){
	    $name = Html::encode($twelForm->name);
	    $twelForm->name = $name . ' - backlan! ))';
	    
	    $email = Html::encode($twelForm->email);
	    $twelForm->email = $email;

	    $data['message'] = '';
	    if(!is_dir(Yii::$app->basePath.'/photo')){
		mkdir(Yii::$app->basePath.'/photo');
		chmod(Yii::$app->basePath.'/photo', 0777);
	    }
	    
	    $twelForm->file = UploadedFile::getInstance($twelForm, 'file');
	    
	    if(!empty($twelForm->file)){
//		$twelForm->file->saveAs(Yii::$app->basePath.'/photo/'.$twelForm->file->baseName.'.'.$this->file->extension);
		$twelForm->file->saveAs(Yii::$app->basePath.'/photo/'.$twelForm->file->name);
		$data['message']  .= 'File is load';
	    } else {
		$data['message'] .= 'No file load';
	    }
	    
	} else {
	    $data['message'] = '';
	    $data['name'] = '';
	    $data['email'] = '';
	}
//	$data['dir'] = Yii::$app->params->adminEmail;
//	$data['dir'] = Yii::$app->params['someData'];
	
        return $this->render('form', array('twel' => $twelForm, 'data' => $data));
    }
    
    public function actionComments()
    {
	
	$data = array();
	$data['comments'] = Coments::find()->all();
	
	return $this->render('comments',['data' => $data]);
    }
    
    public function actionTranslet()
    {
	return $this->render('translet');
    }
    
    public function actionComment()
    {
	
	$comments = Coments::find();
	
	$page = new Pagination([
		'defaultPageSize' => 2,
		'totalCount' => $comments->count(),
	    ]);
	$coment = $comments->offset($page->offset)->limit($page->limit)->all();
	
	return $this->render('comment',['coments' => $coment, 'page' => $page]);
    }
    
    public function actionSession()
    {
	
	$data = array();

	$name = Yii::$app->request->get('name', 'Guest');
	$nameS = Yii::$app->session->get('name', 'GuestS');
	
	$session = Yii::$app->session;
	
	$session->set('name', $name);
	
	$session->remove('name');
	
	return $this->render('session',['data' => $data]);
    }
    
    public function actionUrl($id = null)
    {
	if(!empty(Yii::$app->request->get('id')))
	{
	    $comment = News::find()->where(['id' => (int)Yii::$app->request->get('id')])->one();
	    if(empty($comment)){
//		return Yii::$app->getResponse()->redirect('/twel/url');
		throw new \yii\web\NotFoundHttpException('Fuck ... ! Bad request!');
//		return Yii::$app->response->setStatusCode(500);
	    }
	    return $this->render('urliitem',['coment' => $comment]);
	} else {
	    $comments = News::find();
	    $page = new Pagination([
		    'defaultPageSize' => 2,
		    'totalCount' => $comments->count(),
		]);
	    $coment = $comments->offset($page->offset)->limit($page->limit)->all();
	    return $this->render('urli',['coments' => $coment, 'page' => $page]);
	}
    }
}
