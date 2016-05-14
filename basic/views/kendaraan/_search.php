<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KendaraanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kendaraan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PlatNomor') ?>

    <?= $form->field($model, 'NomorSTNK') ?>

    <?= $form->field($model, 'Tipe') ?>

    <?= $form->field($model, 'Merek') ?>

    <?= $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'UrlFoto') ?>

    <?php // echo $form->field($model, 'Pinjam_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
