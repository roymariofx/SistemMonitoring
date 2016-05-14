<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnitRegionBankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unit Region Banks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-region-bank-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Unit Region Bank', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Region',
            'Country',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
