<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = $model->idLaporan;
$this->params['breadcrumbs'][] = ['label' => 'Laporan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="laporan-view">

    <h1><?= Html::encode($this->title) ?></h1>

      <?php $role= Yii::$app->user->identity->Role;
            if($role=='0'){ ?>
        <?= Html::a('Ubah', ['update', 'id' => $model->idLaporan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->idLaporan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus laporan ini?',
                'method' => 'post',
            ],
        ]) ?>
    <?php } ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NamaPengguna',
            'BiayaTol',
            'BiayaTilang',
            'BiayaParkir',
            'BiayaBensin',
            'LokasiPOMBensin',
            'KMisiBensin',
            'KMSebelumPergi',
            'KMSesudahPergi',
            'Kdr_PlatNomor',
            'Timestamp',
        ],
    ]) ?>

</div>
