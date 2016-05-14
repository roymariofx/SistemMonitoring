<?php

namespace app\controllers;

use Yii;
use app\models\Laporan;
use app\models\LaporanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UpLoadedFile;
use kartik\mpdf\Pdf;
use app\models\Aktivitas;
use yii\helpers\Json;

/**
 * LaporanController implements the CRUD actions for Laporan model.
 */
class LaporanController extends Controller
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
     * Lists all Laporan models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new LaporanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Laporan model.
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
     * Creates a new Laporan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Laporan();
        //$model->NamaPengguna=Yii::$app->user->identity->username;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $log = new aktivitas;
                $log->username=Yii::$app->user->identity->username;
                $log->deskripsi='menambahkan laporan';
                $log->timestamp=$model->Timestamp;
                $log->save();
            Yii::$app->getSession()->setFlash('success','Anda berhasil menambahkan laporan');
            $connection = \Yii::$app->db;
        $view = $connection->createCommand("UPDATE peminjaman AS a 
   INNER JOIN kendaraan b ON a.Kdr_PlatNomor = b.PlatNomor
   INNER JOIN laporan c ON b.PlatNomor = c.Kdr_PlatNomor
   SET a.StatusLaporan = '1' WHERE a.Tanggal = '$model->TanggalPeminjaman'")->execute();
            return $this->redirect(['view', 'id' => $model->idLaporan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Laporan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success','Anda berhasil mengubah laporan');
            
            $log = new aktivitas;
            $log->username=Yii::$app->user->identity->username;
            $log->deskripsi='mengubah laporan';
            $log->timestamp=date('Y-m-d H:i:s');
            $log->save();
        
            return $this->redirect(['view', 'id' => $model->idLaporan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Laporan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->getSession()->setFlash('success','Anda berhasil menghapus laporan');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Laporan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Laporan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Laporan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requeste6d page does not exist.');
        }
    }

    public function actionList()
    {}
    
    public function actionPrint()
    {

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');

        $searchModel = new LaporanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //$content = Laporan::find()->all();
        $content = $this->renderPartial('cetaklaporan', ['dataProvider'=>$dataProvider, 'searchModel'=>$searchModel]);
        // var_dump($content);
        // return $content;
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_DOWNLOAD, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Laporan Peminjaman Kendaraan'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Laporan Peminjaman Kendaraan'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);


        //$response->format = Response::FORMAT_RAW;
        //Yii::$app->response->setDownloadHeaders($pdf->render());
        // return the pdf output as per the destination setting
        return $pdf->render(); 
        // return $response->send();
        //readfile($pdf->render());
    }
}
