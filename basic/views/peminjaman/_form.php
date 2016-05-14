<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Kendaraan;
use app\models\Pengguna;

$user=Yii::$app->user->identity->username;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="peminjaman-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'], 
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label', 'style' => 'text-align:left'],
        ],
    ]); ?>
<?= $form->field($model, 'NamaPengguna')->hiddenInput(['value'=>$user, 'readonly' =>'readonly'])->label(false) ?>
<?= $form->field($model, 'Tanggal')->widget(
    DatePicker::className(), [
     'model' => $model,
     'attribute' => 'Tanggal',
     'template' => '{addon}{input}',
         'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd', 
            'minDate' => '0',

        ]
]);?>

    <?= $form->field($model, 'Tujuan')->textInput(['maxlength' => 30]) ?>
    <?= $form->field($model, 'Keperluan')->textInput(['maxlength' => 30]) ?>


    <?= $form->field($model, 'Kdr_PlatNomor')->dropDownList(
            ArrayHelper::map(Kendaraan::find()->where(['Status' => "Tersedia"])->all(), 'PlatNomor', 'PlatNomor'),
            ['prompt'=>'Pilih Kendaraan']
            ) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    	<?= Html::a('Batal',['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
