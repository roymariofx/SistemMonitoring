<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kritik dan Saran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php $role= Yii::$app->user->identity->Role;
            if($role=='0'){ ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idFeedback',
            'KritikSaran',
            'NamaPengguna',
            'Timestamp',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete}',
            ],
        ],
    ]); ?>

<?php }
  ?>
</div>
