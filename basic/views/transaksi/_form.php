<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transaksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Tanggal_Transaksi')->textInput() ?>

    <?= $form->field($model, 'ID_Nasabah')->textInput() ?>

    <?= $form->field($model, 'Tipe_Transaksi')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'Rekening_Tujuan')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
