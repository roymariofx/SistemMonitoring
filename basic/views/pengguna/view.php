<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */
$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pengguna-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php $role= Yii::$app->user->identity->Role;
            if($role=='0'){ ?>
                <?= Html::a('Ubah', ['update', 'id' => $model->username], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Hapus', ['delete', 'id' => $model->username], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Apakah anda yakin ingin menghapus pengguna ini?',
                        'method' => 'post',
                    ],
                ]) ?>
            <?php } ?>
            
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'Alamat',
            'Email:email',
            'TanggalLahir',
            'NoTelp',
             ['attribute' => 'Role',
                'value' => $model->Role ==0 ? "Admin": "Pengguna",
            ],

        ],
    ]) ?>

</div>
