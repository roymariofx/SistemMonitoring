<?php

namespace app\controllers;

use Yii;
use app\models\Peminjaman;
use app\models\PeminjamanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UpLoadedFile;
use app\models\Aktivitas;
use app\models\Laporan;

/**
 * PeminjamanController implements the CRUD actions for Peminjaman model.
 */
class PeminjamanController extends Controller
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
     * Lists all Peminjaman models.
     * @return mixed
     */
    public function actionIndex()
    {
         $searchModel = new PeminjamanSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
                'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
            ]);
}

    /**
     * Displays a single Peminjaman model.
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
     * Creates a new Peminjaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Peminjaman();

        if ($model->load(Yii::$app->request->post())) {
           $model->NamaPengguna=Yii::$app->user->identity->username;
       

           $data = Peminjaman::findAll(['Tanggal' => $model->Tanggal, 'Kdr_PlatNomor' => $model->Kdr_PlatNomor, 'Status' => "Diterima"] );
    
           foreach ($data as $key) {
                 if("Diterima" == $key->Status){
                     if($model->Kdr_PlatNomor == $key->Kdr_PlatNomor){
                        if($model->Tanggal == $key->Tanggal){
                            Yii::$app->getSession()->setFlash('danger','Peminjaman pada tanggal dengan kendaraan tersebut tidak dapat dilakukan!');
                           return $this->redirect(['create']);
                        }
                    }
                 }
               
            }

            if($model->save()){
                Yii::$app->getSession()->setFlash('success','Anda berhasil menambahkan peminjaman');
                $log = new aktivitas;
                $log->username=Yii::$app->user->identity->username;
                $log->deskripsi='menambahkan peminjaman';
                $log->timestamp=$model->Timestamp;
                $log->save();

                return $this->redirect(['view', 'id' => $model->idPeminjaman]);}
            else{
                 return $this->render('create', [
                'model' => $model,
            ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Peminjaman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             Yii::$app->getSession()->setFlash('success','Anda berhasil menambahkan peminjaman');
                $log = new aktivitas;
                $log->username=Yii::$app->user->identity->username;
                $log->deskripsi='mengubah peminjaman';
                $log->timestamp=$model->Timestamp;
                $log->save();

            Yii::$app->getSession()->setFlash('success','Anda berhasil mengubah peminjaman');

            return $this->redirect(['view', 'id' => $model->idPeminjaman]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Peminjaman model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->getSession()->setFlash('success','Anda berhasil menghapus peminjaman');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Peminjaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Peminjaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peminjaman::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionStatus($id) {
        $model = new Peminjaman();
        $model = $this->findModel($id);
        if(isset($_GET['action']) && $_GET['action'] == "Diterima")
        {
            $model->Status = $_GET['action'];
            if($model->save()){

 $this->redirect(array('index', 'id' => $model->idPeminjaman));
      }
    }
        else if(isset($_GET['action']) && $_GET['action'] == "Ditolak")
            {
            $model->Status = $_GET['action'];
        if($model->save()){
         $this->redirect(array('index', 'id' => $model->idPeminjaman));
         
        }
        }
    }


}

    
