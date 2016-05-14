<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = 'Tambah Kritik dan Saran';
$this->params['breadcrumbs'][] = ['label' => 'Kritik dan Saran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
