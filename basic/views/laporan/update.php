<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = 'Ubah Laporan: ' . ' ' . $model->idLaporan;
$this->params['breadcrumbs'][] = ['label' => 'Laporan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLaporan, 'url' => ['view', 'id' => $model->idLaporan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laporan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
