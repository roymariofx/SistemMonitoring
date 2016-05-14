<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$this->title = $model->idPeminjaman;
$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="peminjaman-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $role= Yii::$app->user->identity->Role;
            if($role=='0'){ ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->idPeminjaman], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus peminjaman ini?',
                'method' => 'post',
            ],
        ]) ?>
    <?php } 
            ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPeminjaman',
            'Status',
            'Tanggal',
            'Tujuan',
            'Keperluan',
            'Timestamp',
            'NamaPengguna',
            'Kdr_PlatNomor',
            ['attribute' => 'StatusLaporan',
                'value' => $model->StatusLaporan ==0 ? "Belum Ada": "Sudah Ada",
            ],
        ],
    ]) ?>
    

</div>
