<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kendaraan */


$this->title = $model->PlatNomor;
$this->params['breadcrumbs'][] = ['label' => 'Kendaraan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="kendaraan-view">

    <h1><?= Html::encode($this->title) ?></h1>
  <?php $role= Yii::$app->user->identity->Role;
            if($role=='0'){ ?>
        <?= Html::a('Ubah', ['update', 'id' => $model->PlatNomor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->PlatNomor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus kendaraan ini?',
                'method' => 'post',
            ],
        ]) ?>
 <?php } ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PlatNomor',
            'NomorSTNK',
            'Tipe',
            'Merek',
            'Status',
            'foto'
        ],
    ]) ?>

<img class='gambar' src="<?=Url::to("@web/$model->foto")?>.jpg"/>
    
</div>


