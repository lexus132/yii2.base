<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Events;
use app\models\Posts;
use app\models\LoginForm;
use app\models\ContactForm;
//use yii\

class SiteController extends Controller
{
    
    public $layout = '@app/views/layouts/main.php';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEvents()
    {
	$event = new Events;
	
	print_r('<pre>');
	
//	$event->on(Events::SOME_DEFAULT_EVENT, function($event)
//	$event->off(Events::SOME_DEFAULT_EVENT, function($event)
	
	// Method 1 (callBack анонимные функции)
	$event->on(Events::SOME_DEFAULT_EVENT, function($event){
//	    print_r($event->name);	// name event
//	    print_r($event->sender);	// Model where event actation
//	    print_r($event->data);	// Data in 3-th params
//	    $event->handled = true;	// abort event (in model)
	    print_r('Is done event!');
	}, ['data' => 'text line']);
	
	// Method 2 (передать объект и вторым параметром [название метода в этом оъекте])
	$event->on(Events::SOME_DEFAULT_EVENT, [$event, 'methodFromObject']);
	
	// Method 3 (передать объект и вторым параметром [название метода в этом оъекте])
	$event->on(Events::SOME_DEFAULT_EVENT, ['app\models\User', 'methodInUser']);
	
	// Method 4 (global functions)
	$event->on(Events::SOME_DEFAULT_EVENT, 'get_class');
	
	$event->trigger(Events::SOME_DEFAULT_EVENT);
	exit;
	
        return $this->render('events');
    }
    
    public function actionBehavior(){
	
	$posts = new Posts();
	
	echo '<pre>';
	print_r($posts->name);
	echo '<br>';
	print_r($posts->param1);
	echo '<br>';
	print_r($posts->param2);
	echo '<br>';
	print_r($posts->foo());
	echo '<br>';
	
	
//	print_r($posts);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionVideo()
    {
        return $this->render('video');
    }
}
