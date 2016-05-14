<?php
use \app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>

<header class="header">

<?= Html::a(Yii::$app->name, Yii::$app->homeUrl, ['class' => 'logo']) ?>

<nav class="navbar navbar-static-top" role="navigation">

<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>

<div class="navbar-right">

<ul class="nav navbar-nav">


<?php
if (Yii::$app->user->isGuest) {
    ?>
    <li class="footer">
        <?= Html::a('Login', ['/site/login']) ?>
    </li>
<?php
} else {
    ?>
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <span><?= @Yii::$app->user->identity->username ?> <i class="caret"></i></span>
        </a>
        <ul class="dropdown-menu">
          
            <!-- Menu Body -->
            <li class="user-body ">
                <div class="col-xs-4 text-center">
                    <?= Html::a(
                            'Edit Profile',
                            ['/pengguna/editprofile?id=' . Yii::$app->user->getId()],
                            ['data-method' => 'post','class'=>'btn btn-default btn-flat']
                        ) ?>
                
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#"></a>
                </div>
                <div class="col-xs-4 text-center">
                    <?= Html::a(
                            'Sign out',
                            ['/site/logout'],
                            ['data-method' => 'post','class'=>'btn btn-default btn-flat']
                        ) ?>
                </div>
            </li>
            <!-- Menu Footer-->
          
        </ul>
    </li><?php
}
?>
<!-- User Account: style can be found in dropdown.less -->

</ul>
</div>
</nav>
</header>
