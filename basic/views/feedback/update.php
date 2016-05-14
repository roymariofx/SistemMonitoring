<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = 'Ubah Kritik dan Saran: ' . ' ' . $model->idFeedback;
$this->params['breadcrumbs'][] = ['label' => 'Kritik dan Saran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFeedback, 'url' => ['view', 'id' => $model->idFeedback]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="feedback-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
