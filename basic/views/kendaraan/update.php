<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kendaraan */

$this->title = 'Ubah Kendaraan: ' . ' ' . $model->PlatNomor;
$this->params['breadcrumbs'][] = ['label' => 'Kendaraan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PlatNomor, 'url' => ['view', 'id' => $model->PlatNomor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kendaraan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
