<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabunganNasabahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabungan-nasabah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ID_Nasabah') ?>

    <?= $form->field($model, 'ID_Tabungan') ?>

    <?= $form->field($model, 'ID_Unit_Region') ?>

    <?= $form->field($model, 'NOMINAL_TABUNGAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
