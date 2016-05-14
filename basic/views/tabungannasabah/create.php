<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TabunganNasabah */

$this->title = 'Create Tabungan Nasabah';
$this->params['breadcrumbs'][] = ['label' => 'Tabungan Nasabahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabungan-nasabah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
