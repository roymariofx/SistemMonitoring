<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Peminjaman;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KendaraanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kendaraan';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="kendaraan-index">

    <h1><?= Html::encode($this->title) ?></h1>

     <?php $role= Yii::$app->user->identity->Role;
            if($role=='0'){ ?>
            <p>
        <?= Html::a('Tambah Kendaraan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
         <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PlatNomor',
            'NomorSTNK',
            'Tipe',
            'Merek',
            'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?= Html::a('Lihat Statistik', ['/kendaraan/statistikkendaraan'], ['class' => 'btn btn-primary']) ?>
        <?php } ?>

        <?php $role= Yii::$app->user->identity->Role;
            if($role=='1'){ ?>
         <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PlatNomor',
            'NomorSTNK',
            'Tipe',
            'Merek',
            'Status',
            // ['attribute' => 'Status',
            // 'value' => function ($kendaraan){
                    
            //             $peminjaman = Peminjaman::find()->where(['Kdr_PlatNomor'=>$kendaraan->PlatNomor,'Tanggal'=>date('Y-m-d')])->one();
                                     
            //             return  $peminjaman ? "Tidak Tersedia": "Tersedia";
                    
                    
            //     }
            // ],
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            ],
        ],
    ]); ?>
        <?php } ?>
        
</div>
