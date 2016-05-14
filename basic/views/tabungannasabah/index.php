<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TabunganNasabahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabungan Nasabah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabungan-nasabah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabungan Nasabah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ID_Nasabah',
            'ID_Tabungan',
            'ID_Unit_Region',
            'NOMINAL_TABUNGAN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
