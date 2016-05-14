<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use app\models\Peminjaman;
use app\models\Kendaraan;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
$this->title = 'Statistik Kendaraan';
$this->params['breadcrumbs'][] = ['label' => 'Kendaraan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-statistikkendaraan">
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
            'text' => 'Statistik Peminjaman Kendaraan Bulan Ini',
        ],
        'xAxis' => [
            'categories' => array_values(ArrayHelper::map($statistik, 'PlatNomor', 'PlatNomor')),
        ],
        'labels' => [
            'items' => [
                [
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
                'name' => 'Plat Nomor Kendaraan',
                'data' => array_values(ArrayHelper::map($statistik, 'PlatNomor', 'totalPeminjamanInteger'))
            ],
            
        ],
    ]
]);


?>

</div>
