<?php

namespace app\controllers;

use Yii;
use app\models\Pengguna;
use app\models\PenggunaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UpLoadedFile;
use app\models\StatistikPengguna;

/**
 * PenggunaController implements the CRUD actions for Pengguna model.
 */
class PenggunaController extends Controller
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

    /**
     * Lists all Pengguna models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenggunaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengguna model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pengguna model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pengguna();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('success','Anda berhasil menambahkan pengguna');

            return $this->redirect(['view', 'id' => $model->username]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pengguna model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('success','Anda berhasil mengubah pengguna');

            return $this->redirect(['view', 'id' => $model->username]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionEditprofile($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('success','Anda berhasil mengubah profile');

            return $this->redirect(['view', 'id' => $model->username]);
        } else {
            return $this->render('editprofile', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Deletes an existing Pengguna model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

         Yii::$app->getSession()->setFlash('success','Anda berhasil menghapus pengguna');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengguna model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengguna the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengguna::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionRole()
    {
        if (Yii::$app->user->identity->Role == '0'){
            return 'admin';
            } 
        else{
            return 'pengguna';
            }
    }

    public function actionStatistikpengguna()
    {
        $statistik = StatistikPengguna::find()->where(['bulan'=>date('m'), 'tahun'=>date('Y')])->all();

        return $this->render('/pengguna/statistikpengguna', ['statistik'=>$statistik]);
    }
}
