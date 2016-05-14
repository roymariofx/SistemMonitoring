<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabunganNasabah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabungan-nasabah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Nasabah')->textInput() ?>

    <?= $form->field($model, 'ID_Tabungan')->textInput() ?>

    <?= $form->field($model, 'ID_Unit_Region')->textInput() ?>

    <?= $form->field($model, 'NOMINAL_TABUNGAN')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
