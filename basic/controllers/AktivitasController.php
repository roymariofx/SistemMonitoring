<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Aktivitas;
use app\models\AktivitasSearch;

class AktivitasController extends Controller
{
	public function behaviors()
    {
        return [
            'access' =>[
                'class' => AccessControl::classname(),
                'only' =>['create','update','view','index'],
                'rules' =>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ],
                ]     
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
	 public function actionIndex()
	    {
	         $searchModel = new AktivitasSearch();
	         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	            return $this->render('index', [
	                'searchModel' => $searchModel,
	                'dataProvider' => $dataProvider,
	            ]);
	    }
   protected function findModel($id)
    {
        if (($model = aktivitas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}