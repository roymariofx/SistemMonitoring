<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idLaporan') ?>

    <?= $form->field($model, 'BiayaTol') ?>

    <?= $form->field($model, 'BiayaTilang') ?>

    <?= $form->field($model, 'BiayaParkir') ?>

    <?= $form->field($model, 'BiayaBensin') ?>

    <?php // echo $form->field($model, 'LokasiPomBensin') ?>

    <?php // echo $form->field($model, 'KmIsiBensin') ?>

    <?php // echo $form->field($model, 'KmSebeleumPergi') ?>

    <?php // echo $form->field($model, 'KmSesudahPergi') ?>

    <?php // echo $form->field($model, 'Kdr_PlatNomor') ?>

    <?php // echo $form->field($model, 'Pengguna_Id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
