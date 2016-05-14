<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kendaraan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kendaraan-form">
    <?php $form = ActiveForm::begin(['options' =>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'PlatNomor')->textInput(['maxlength' => 9,'style'=>'width:400px']) ?>

    <?= $form->field($model, 'NomorSTNK')->textInput(['style'=>'width:400px']) ?>

    <?= $form->field($model, 'Tipe')->dropDownList(['Mobil' => 'Mobil','Motor' => 'Motor'],['style'=>'width:400px']) ?>

    <?= $form->field($model, 'Merek')->textInput(['maxlength' => 20, 'style'=>'width:400px']) ?>

    <?= $form->field($model, 'Status')->dropDownList(['Tersedia' => 'Tersedia','Tidak Tersedia' => 'Tidak Tersedia',],['style'=>'width:400px']) ?>

    <?= $form->field($model, 'file')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         <?= Html::a('Batal',['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>