<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => ' ',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $items = [];
    if(Yii::$app->user->can('admin-access')){
        $items[]= ['label' => Yii::t('app', 'Teachers'), 'url' => ['/teacher/index']];
    };
    if(Yii::$app->user->can('admin-access')){
        $items[]= ['label' => Yii::t('app', 'Expenses'), 'url' => ['/expenses/index']];
    };
    if(Yii::$app->user->can('subject')){
        $items[]= ['label' => Yii::t('app', 'Subjects'), 'url' => ['/subject/index']];
    };
    if(Yii::$app->user->can('student')){
        $items[]= ['label' => Yii::t('app', 'Students'), 'url' => ['/student/index']];
    };
    if(Yii::$app->user->can('admin-access')){
        $items[]= ['label' => Yii::t('app', 'Filial'), 'url' => ['/filial/index']];
    };
    $items[] = Yii::$app->user->isGuest ? (
    ['label' => Yii::t('app','Login'), 'url' => ['/site/index']]
    ) : (
        '<li>'
        . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
        . Html::submitButton(
            Yii::t('app','Logout').' (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link']
        )
        . Html::endForm()
        . '</li>'
    );
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
