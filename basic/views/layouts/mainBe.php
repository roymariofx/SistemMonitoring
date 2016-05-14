<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
// if (Yii::$app->controller->action->id === 'login') {
//     echo $this->render(
//         'wrapper-black',
//         ['content' => $content]
//     );
// } else {
    dmstr\web\AdminLteAsset::register($this);
    \app\assets\AppAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower') . '/admin-lte';
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="skin-blue">
    <?php $this->beginBody() ?>


     <div class="wrapper row-oncanvas row-oncanvas-left">

        <?= $this->render(
            'contentBe.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>

