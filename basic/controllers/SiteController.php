<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class SiteController extends Controller
{
    public $layout='main';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout, login'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
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

    public function actionIndex()
    {
       // $this->getView()->registerJsFile('js/fileinput.js');
      $this->layout='mainBe';
        return $this->render('index');
    }


    public function actionLogin()
    {
       $this->layout='mainBe';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
        return $this->redirect('home');

        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
       $this->layout='mainBe';
        Yii::$app->user->logout();
        return $this->render('index');
        //    return $this->redirect('/SistemMonitoring/basic/web/index.php/');
       // return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAktivitas()
    {
        return $this->render('aktivitas');
    }
    public function actionPeminjaman()
    {
        return $this->render('peminjaman');
    }
    public function actionHome()
    {
        return $this->render('home');
    }
    public function actionLaporan()
    {
        return $this->render('laporan');
    }
    public function actionKendaraan()
    {
        return $this->render('kendaraan');
    }

    public function actionPengguna()
    {
        if(Yii::app()->user->isGuest)
            {
                $this->layout = '//layouts/main';
                return $this->render('pengguna'); // do not include .php
            }
        if(Yii::app()->user->isAdmin)
            {
                $this->layout = '//layouts/main'; // do not include .php
                return $this->render('pengguna');
            }
        else{
                $this->layout = '//layouts/mainBefore';
            }
    }
        
}

