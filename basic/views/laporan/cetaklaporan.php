<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'cetaklaporan';
$this->params['breadcrumbs'][] = $this->title;


?>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>"<h2>  </h2> {items}",
        //'pagination' => disable,
        //'filterModel' => $searchModel,
        'columns' => 
        [
            'NamaPengguna',
            'BiayaTol',
            'BiayaTilang',
            'BiayaParkir',
            'BiayaBensin',
            'LokasiPOMBensin',
            'KMisiBensin',
            'KMSebelumPergi',
            'KMSesudahPergi',
            'Kdr_PlatNomor',
        ],
    ]);
?>

