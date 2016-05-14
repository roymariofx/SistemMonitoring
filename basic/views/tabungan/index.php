<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TabunganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabungans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabungan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabungan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Jenis_Tabungan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
