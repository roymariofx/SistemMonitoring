<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'Aktivitas Terbaru';
$this->params['breadcrumbs'][] = $this->title;

$user=Yii::$app->user->identity->username;
?>


<div class="aktivitas-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?php $role= Yii::$app->user->identity->Role;
            if($role=='0'){ ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'deskripsi',
            'timestamp',
        ],
    ]);

    ?>
    </p>
    <?php } ?>

</div>
