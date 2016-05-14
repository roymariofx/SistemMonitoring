<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use app\models\Peminjaman;
use app\models\Pengguna;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
$this->title = 'Statistik Pengguna';
$this->params['breadcrumbs'][] = ['label' => 'Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengguna-statistikpengguna">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

<?php    


   echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'title' => [
            'text' => 'Statistik Peminjaman Kendaraan Seluruh Pengguna Bulan Ini',
        ],
        'xAxis' => [
            'categories' => array_values(ArrayHelper::map($statistik, 'username', 'username')),
        ],
        'labels' => [
            'items' => [
                [
                   // 'html' => 'Peminjaman Kendaraan Seluruh Pengguna',
                    'style' => [
                        'left' => '50px',
                        'top' => '18px',
                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        'series' => [
            [
                'type' => 'column',
                'name' => 'Nama Pengguna',
                'data' => array_values(ArrayHelper::map($statistik, 'username', 'totalPeminjamanInteger'))
            ],
        ],
    ]
]);


?>

</div>
