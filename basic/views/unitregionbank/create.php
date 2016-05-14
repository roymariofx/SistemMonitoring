<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UnitRegionBank */

$this->title = 'Create Unit Region Bank';
$this->params['breadcrumbs'][] = ['label' => 'Unit Region Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-region-bank-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
