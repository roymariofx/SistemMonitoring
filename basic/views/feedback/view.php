<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = $model->idFeedback;
$this->params['breadcrumbs'][] = ['label' => 'Kritik dan Saran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="feedback-view">

    <h1><?= Html::encode($this->title) ?></h1>
<?php $role= Yii::$app->user->identity->Role;
            if($role=='0'){ ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->idFeedback], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus kritik dan saran ini?',
                'method' => 'post',
            ],
        ]) ?>
  <?php } 
            ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 
           'NamaPengguna',
            'KritikSaran',
            'Timestamp',

        ],
    ]) ?>

</div>
