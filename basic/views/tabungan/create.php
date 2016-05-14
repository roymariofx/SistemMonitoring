<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tabungan */

$this->title = 'Create Tabungan';
$this->params['breadcrumbs'][] = ['label' => 'Tabungans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabungan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
