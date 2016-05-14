<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengguna-formEdit">
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label', 'style' => 'text-align:left'],
        ],
    ]); ?>
    
    <?= $form->field($model, 'username')->textInput(['maxlength' => 30]) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 32,'value'=>'']) ?>
    <?= $form->field($model, 'repeatPassword')->passwordInput(['maxlength' => 32]) ?>
     <?= $form->field($model, 'Alamat')->textArea(['maxlength' => 60]) ?>
     <?= $form->field($model, 'Email')->input('email') ?>
     <?= $form->field($model, 'TanggalLahir')->widget(
    DatePicker::className(), [
     'model' => $model,
     'attribute' => 'TanggalLahir',
     'template' => '{addon}{input}',
         'clientOptions' => [
             'autoclose' => true,
            'format' => 'yyyy-mm-dd'

        ]
]);?>
     <?= $form->field($model, 'NoTelp')->textInput(['maxlength' => 15]) ?>
       

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Batal',['site/home'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
