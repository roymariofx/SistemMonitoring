<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeminjamanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peminjaman-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPeminjaman') ?>

    <?= $form->field($model, 'Status') ?>

    <?= $form->field($model, 'Tanggal') ?>

    <?= $form->field($model, 'Tujuan') ?>

    <?= $form->field($model, 'Keperluan') ?>
    
    <?= $form->field($model, 'Kdr_PlatNomor') ?>

    <?php // echo $form->field($model, 'Timestamp') ?>

    <?php // echo $form->field($model, 'Pengguna_Id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
