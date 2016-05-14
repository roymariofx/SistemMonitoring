<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Nasabah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nasabah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Unit_ID')->textInput() ?>

    <?= $form->field($model, 'NAMA_NASABAH')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'Nilai_Kekayaan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
