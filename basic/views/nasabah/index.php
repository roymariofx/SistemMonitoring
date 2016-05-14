<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NasabahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nasabahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nasabah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Nasabah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Unit_ID',
            'NAMA_NASABAH',
            'Nilai_Kekayaan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
