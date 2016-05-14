<?php

use yii\helpers\Html;
use yii\grid\GridView;
// use kartik\export\ExportMenu;
// // use kartik\grid\GridView;
// use kartik\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="laporan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Tambah Laporan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $role= Yii::$app->user->identity->Role;
            if($role=='0'){ ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'NamaPengguna',
            'Kdr_PlatNomor',
            'TanggalPeminjaman',
            'Timestamp',
        ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
        <?= Html::a('Cetak PDF Laporan', ['print'], ['class' => 'btn btn-primary']) ?>
        <?php }
    ?>


<?php $role= Yii::$app->user->identity->Role;
            if($role=='1'){ ?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'TanggalPeminjaman',
            'Kdr_PlatNomor',
            'Timestamp',
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update}',
            ],
    ],
    ]); 
    ?>
<?php } ?>



</div>

