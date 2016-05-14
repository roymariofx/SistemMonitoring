<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use app\models\Kendaraan;
use kartik\money\MaskMoney;
use app\models\Peminjaman;
use app\models\Laporan;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */
/* @var $form yii\widgets\ActiveForm */
$user=Yii::$app->user->identity->username;
?>

<div class="laporan-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label', 'style' => 'text-align:left']
        ],
    ]); ?>
    <?= $form->field($model, 'NamaPengguna')->hiddenInput(['value'=>$user, 'readonly' =>'readonly'])->label(false) ?>

    <?= $form->field($model, 'Kdr_PlatNomor',[
        'template' => "{label}<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ])->dropDownList(
            ArrayHelper::map(Peminjaman::find()->where(['NamaPengguna' => $user, 'StatusLaporan' => 0, 'Status' => "Diterima"])->all(), 'Kdr_PlatNomor', 'Kdr_PlatNomor'),
            ['prompt'=>'Pilih Plat Nomor Kendaraan']
    ) ?>

        <?= $form->field($model, 'TanggalPeminjaman',[
        'template' => "{label}<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ])->dropDownList(
            ArrayHelper::map(Peminjaman::find()->where(['NamaPengguna' => $user, 'StatusLaporan' => 0, 'Status' => "Diterima"])->all(), 'Tanggal', 'Tanggal'),
            ['prompt'=>'Pilih Tanggal Peminjaman']
    ) ?>

    <?= $form->field($model, 'BiayaTol',[
        'template' => "{label}\n<div class=\"col-lg-4\">Rp{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'BiayaTilang',[
        'template' => "{label}\n<div class=\"col-lg-4\">Rp{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'BiayaParkir',[
        'template' => "{label}\n<div class=\"col-lg-4\">Rp{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'BiayaBensin',[
        'template' => "{label}\n<div class=\"col-lg-4\">Rp{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'LokasiPOMBensin',[
         'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'KMisiBensin',[
        'template' => "{label}\n<div class=\"col-lg-4\">{input}KM</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'KMSebelumPergi',[
         'template' => "{label}\n<div class=\"col-lg-4\">{input}KM</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'KMSesudahPergi',[
         'template' => "{label}\n<div class=\"col-lg-4\">{input}KM</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
        <?= Html::a('Batal',['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
