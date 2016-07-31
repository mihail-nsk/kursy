<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subject */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Subject, 'url' => ['view', 'id' => $model->SubjectID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="subject-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'filials' => $filials,
        'teachers' => $teachers
    ]) ?>

</div>
