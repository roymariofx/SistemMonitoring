<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = 'Tambah Laporan';
$this->params['breadcrumbs'][] = ['label' => 'Laporan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
