<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
$user=Yii::$app->user->identity->username;
?>

<div class="feedback-form">

     <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-2\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label', 'style' => 'text-align:left']
        ],
    ]); ?>

    <?= $form->field($model, 'NamaPengguna')->hiddenInput(['value'=>$user, 'readonly' =>'readonly'])->label(false) ?> 
    <?= $form->field($model, 'KritikSaran')->textArea(['maxlength' => 500]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?= Html::a('Batal',['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
