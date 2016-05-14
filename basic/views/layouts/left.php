<?php
use yii\bootstrap\Nav;

?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                
                <div class="pull-left info">
                    <p>Halo, <?= @Yii::$app->user->identity->username ?></p>
                </div>
                
            </div>
        <?php endif ?>

        

        <?php
       $role=Yii::$app->user->identity->Role;
       if($role=='0'){
           echo Nav::widget(
                [
                    'encodeLabels' => false,
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        // [
                        //     'label' => '<span class="text-info">Menu </span>',
                        // ],
                    //    ['label' => '<span class="fa fa-tasks "></span> Aktivitas Terbaru', 'url' => ['/aktivitas']],
                    //    ['label' => '<span class="fa fa-user "></span> Pengguna', 'url' => ['/pengguna']],
                    //    ['label' => '<span class="fa fa-automobile "></span> Kendaraan', 'url' => ['/kendaraan']],
                    //    ['label' => '<span class="fa fa-calendar"></span> Peminjaman', 'url' => ['/peminjaman']],
                    //    ['label' => '<span class="fa fa-file-text-o"></span> Laporan', 'url' => ['/laporan']],
                    //    ['label' => '<span class="fa fa-comment-o"></span> Kritik dan Saran', 'url' => ['/feedback/index']],
                        ['label' => '<span class="fa fa-file-text-o"></span> Nasabah', 'url' => ['/nasabah']],
                        ['label' => '<span class="fa fa-file-text-o"></span> Tabungan', 'url' => ['/tabungan']],
                        ['label' => '<span class="fa fa-file-text-o"></span> Tabungan Nasabah', 'url' => ['/tabungannasabah']],
                        ['label' => '<span class="fa fa-file-text-o"></span> Transaksi', 'url' => ['/transaksi']],
                        ['label' => '<span class="fa fa-file-text-o"></span> Unit Region Bank', 'url' => ['/unitregionbank']],
                    ],
                ]
            );
       }
       if($role=='1'){
        echo Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    // [
                    //     'label' => '<span class="text-info">Menu </span>',
                      
                    // ],
                    
                    ['label' => '<span class="fa fa-automobile "></span> Kendaraan', 'url' => ['/kendaraan']],
                    ['label' => '<span class="fa fa-calendar"></span> Peminjaman', 'url' => ['/peminjaman']],
                    ['label' => '<span class="fa fa-file-text-o"></span> Laporan', 'url' => ['/laporan']],
                    ['label' => '<span class="fa fa-comment-o"></span> Kritik dan Saran', 'url' => ['/feedback/create']],
                ],
            ]
        );}
        ?>

    </section>

</aside>
