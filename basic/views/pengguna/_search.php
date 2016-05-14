<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PenggunaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengguna-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'Alamat') ?>

    <?= $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'TanggalLahir') ?>

    <?php // echo $form->field($model, 'NoTelp') ?>

    <?php // echo $form->field($model, 'Role') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
