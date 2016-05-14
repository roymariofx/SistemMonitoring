<?php

namespace app\controllers;

use Yii;
use app\models\Kendaraan;
use app\models\KendaraanSearch;
use app\models\StatistikPeminjaman;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\db\Query;


/**
 * KendaraanController implements the CRUD actions for Kendaraan model.
 */
class KendaraanController extends Controller
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
     * Lists all Kendaraan models.
     * @return mixed
     */
    public function actionIndex()
    {
        // if(Yii::$app->user->Role != 0){
        //     return
        // }
        $searchModel = new KendaraanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);


    }

    /**
     * Displays a single Kendaraan model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $connection = \Yii::$app->db;
        $tgl = date('Y-m-d');
        $view = $connection->createCommand("UPDATE kendaraan a 
   JOIN peminjaman b ON a.PlatNomor = b.Kdr_PlatNomor  
   SET a.Status = 'Tidak Tersedia' WHERE a.PlatNomor='$id' and b.Tanggal='$tgl' and b.StatusLaporan = 'Belum Ada'")->execute();
       
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kendaraan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kendaraan();

        if ($model->load(Yii::$app->request->post())) 
        {
            $imageName = $model->PlatNomor;
            $model->file = UploadedFile::getInstance($model,'foto');
            //$model->foto->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
            $model->file = 'uploads/'.$imageName.'.'.$model->file->extension;
            $model->save();

            Yii::$app->getSession()->setFlash('success','Anda berhasil menambahkan kendaraan');

            return $this->redirect(['view', 'id' => $model->PlatNomor]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Kendaraan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           Yii::$app->getSession()->setFlash('success','Anda berhasil mengubah kendaraan');

            return $this->redirect(['view', 'id' => $model->PlatNomor]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Kendaraan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->getSession()->setFlash('success','Anda berhasil menghapus kendaraan');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kendaraan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Kendaraan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kendaraan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function getImageurl()
    {
      return \Yii::getAlias('@imageurl').'/'.$this->foto;
    }

     public function actionStatistikkendaraan()
    {
        $statistik = StatistikPeminjaman::find()->where(['bulan'=>date('m'), 'tahun'=>date('Y')])->all();

        return $this->render('/kendaraan/statistikkendaraan', ['statistik'=>$statistik]);
    }
}
