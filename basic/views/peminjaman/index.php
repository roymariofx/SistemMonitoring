<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Peminjaman;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="peminjaman-index">

    <h1><?= Html::encode($this->title) ?></h1>
       <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 
    <p>
        <?= Html::a('Tambah Peminjaman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

        <?php $role= Yii::$app->user->identity->Role;
            if($role=='0'){ ?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            ['class' => 'yii\grid\SerialColumn'],
            'Tanggal',
            'Tujuan',
            'Keperluan',
            'Timestamp',
            'Kdr_PlatNomor',
            //'Pengguna_Id',
            'NamaPengguna',
             ['attribute' => 'StatusLaporan',
                'value' => function ($data){
                 return $data->StatusLaporan==0 ? "Belum Ada": "Sudah Ada";
                }
            ],
            'Status',
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{Diterima} {Ditolak}',
            'buttons' => [
               'Diterima' => function ($url, $model) {
                    if( $model->Status!='Diterima')
                        return Html::a('Terima', ['status', 'id' => $model->idPeminjaman, 'action' => 'Diterima'], ['class' => 'btn btn-primary', 
                            'data' => [
                            'confirm' => 'Apakah anda yakin ingin menerima peminjaman ini?',
                            'method' => 'post'],],
                            ['id' => 'Diterima']); 
                },
                'Ditolak' => function ($url,$model,$key) {
                    if( $model->Status!='Ditolak')
                        return Html::a('Tolak', ['status','id' => $model->idPeminjaman, 'action' => 'Ditolak'], [ 
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Apakah anda yakin ingin menolak peminjaman ini?',
                                'method' => 'post'],],
                            ['id' => 'Ditolak']); 
                            },
                    ],

                    ],
                
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete}',
            ],
        ],
    ]); 
    ?>
 <?php }
  ?>
   <?php $role= Yii::$app->user->identity->Role;
            if($role=='1'){ ?>
       <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            ['class' => 'yii\grid\SerialColumn'],

            'Tanggal',
            'Tujuan',
            'Keperluan',
            'Timestamp',
            'Kdr_PlatNomor',
            'Status',
        ],
    ]); 
    ?>
  <?php } 
            ?>

</div>
